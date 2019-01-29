<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\MetosForecast;
use League\Fractal\TransformerAbstract;
use Helper,Cache,Carbon;

class MetosTransformer extends TransformerAbstract{

	protected $availableIncludes = [];

	public function transform(MetosForecast $metos){

		$shift = "day";
		$wind_direction = "";

		if(($metos->hour >= 0 AND $metos->hour <= 5) OR ($metos->hour >= 17 AND $metos->hour <= 23 )){
			$shift = "night";
		}

		$ave = array_sum([$metos->low_clouds,$metos->medium_clouds,$metos->high_clouds]) / 3;

		if($metos->probability_of_precip >= 50 AND $metos->probability_of_precip <= 79){
			$status = "Heavy Rain";
			$image = asset("weather/heavyrain-{$shift}.png");
		}elseif($metos->probability_of_precip >= 80 AND $metos->probability_of_precip <= 100){
			$status = "Thunderstorm";
			$image = asset("weather/thunder-{$shift}.png");
		}else{
			$status = "Clear Sky";
			$image = asset("weather/clear-{$shift}.png");
		}

		$directions = [
			'E' 	=> range(7, 7),
			'NE' 	=> range(6, 6),
			'N' 	=> range(5, 5),
			'NW' 	=> range(4, 4),
			'W' 	=> range(3, 3),
			'SW' 	=> range(2, 2),
			'S' 	=> range(1, 1),
			'SE' 	=> range(8, 8),
		];

		foreach ($directions as $index => $direction) {
			$degree = (int) $metos->wind_direction;
			if(in_array($degree, $direction)) {
				$wind_direction = "{$index}";

				//{$degree}° 
			}
		}
		if($metos->hour == 12){
			$schedule = Carbon::parse($metos->schedule)->format("Y-m-d");
			$station_id = $metos->station_id;
			// $metos->min_temp = "12";
			// $metos->max_temp = "12";
			// dd(Cache::get("metos.{$station_id}.{$schedule}.min"));
			$metos->min_temp = Cache::rememberForever("metos.{$station_id}.{$schedule}.min", function() use($station_id,$schedule){ 
					return MetosForecast::whereRaw("DATE(schedule) = '{$schedule}'")
				                    ->where('station_id',$station_id)
				                    // ->where('hour',22)
				                    ->min('temperature');

			});
			$metos->max_temp = Cache::rememberForever("metos.{$station_id}.{$schedule}.max", function() use($station_id,$schedule){ 
					return MetosForecast::whereRaw("DATE(schedule) = '{$schedule}'")
				                    ->where('station_id',$station_id)
				                    // ->where('hour',12)
				                    ->max('temperature');
			});   
		}

		$date = Carbon::now()->format("Y-m-d");
		$cur_hr = Carbon::now()->format("H");

		if(Carbon::parse($metos->schedule)->format("Y-m-d") == $date AND (int)$cur_hr == (int)$metos->hour ){
			$display_date = Carbon::parse($metos->schedule)->format("F d, ")."Now ".Carbon::now()->format("(h:i A)");
		}else{
			$display_date = Carbon::parse($metos->schedule)->format("F d, g A");
		}
		
		return [
			'schedule' => $metos->schedule,
			'date'	=> $display_date,
			'day'	=> Carbon::parse($metos->schedule)->format("D"),
			'hour' => $metos->hour,
			'read_hr'	=> Carbon::parse($metos->schedule)->format("g A"),
			'temperature' => $metos->temperature . "°",
			'feeled_temperature' => $metos->feeled_temperature . "°",
			'min_temp' => ((int)$metos->min_temp) . "°",
			'max_temp' => ((int)$metos->max_temp) . "°",
			'wind_speed' => $metos->wind_speed ." km/hr {$wind_direction}",
			'precipitation' => ($metos->precipitation / 100)." cm",
			'probability_of_precip_percentage' => $metos->probability_of_precip, 
			'probability_of_precip' => $metos->probability_of_precip. " %",
			'relative_humidity' => $metos->relative_humidity,
			'image' => $image,
			'status' => $status,
			'wind_direction' => $wind_direction,
		];
	}

}