<?php

namespace App\Laravel\Services;

use App\Laravel\Models\ResponseMessage;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use Carbon, Str;

class Helper {

	public static function date_format($time,$format = "M d, Y @ h:i a"){
		return $time == "0000-00-00 00:00:00" ? "" : date($format,strtotime($time));
	}

	public static function time_passed($time){
		$date = Carbon::parse($time);

    	if($date->format("Y-m-d") == Carbon::now()->format("Y-m-d")) {
    		return "Today, ".$date->format("h:i a");
    	} elseif ($date->between(Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek())) {
    		return $date->format("D h:i a");
    	} elseif ($date->format("Y") == Carbon::now()->format("Y")) {
    		return $date->format("d/M h:i a");
    	} else {
    		return $date->format("d/M Y h:i a");
    	}
	}

	public static function month_year($time){
		return date('M Y',strtotime($time));
	}

	public static function date_db($time){
		if(env('DB_CONNECTION','mysql') == "sqlsrv"){
			return date(env('DATEDBSQL_FORMAT','m/d/Y'),strtotime($time));
		}else{
			return date(env('DATEDB_FORMAT','Y-m-d'),strtotime($time));
		}
	}

	/**
	 * Parse date to the standard sql datetime format
	 *
	 * @param date $time
	 * @param string $format
	 *
	 * @return date
	 */
	public static function datetime_db($time) {
		return $time == "0000-00-00 00:00:00" ? "" : date(env('DATETIME_DB',"Y-m-d H:i:s"),strtotime($time));

		// if(env('MASTER_DB_CONNECTION','mysql') == "sqlsrv"){
		// 	return date(env('DATEDBSQL_FORMAT','m/d/Y'),strtotime($time));
		// }else{
		// 	return date(env('DATEDB_FORMAT','Y-m-d H:i:s'),strtotime($time));
		// }
	}

	public static function create_filename($ext) {
		return str_random(20). date("mdYhs") . "." . $ext;
	}

	public static function create_username($name, $counter = 0) {
		return $counter > 0 ? substr(Str::slug($name,""), 0, 19) . ++$counter : substr(Str::slug($name,""), 0, 20);
	}

	public static function str_contract($str) {
		return in_array(substr($str, -1), ['s', "S"]) ? $str . "'" : $str . "'s";
	}

	public static function key_prefix($prefix, array $array = []) {
		foreach($array as $k=>$v){
            $array[$prefix.$k] = $v;
            unset($array[$k]);
        }
        return $array; 
	}

	public static function get_response_message($code, array $vars = []) {
		$response = "";
		$response_message = Cache::remember($code . implode(".", $vars), 1440, function() use($code) {
			return ResponseMessage::where('code', $code)->first();
		});

		if($response_message) {
			$response = $response_message->content;
			foreach ($vars as $key => $value) {
				$response = str_replace('{'.strtolower($key).'}', $value, $response);
			}
		}
		return $response;
	}

	public static function compute_distance(array $origin = ['lat' => NULL, 'long' => NULL], array $destination  = ['lat' => NULL, 'long' => NULL]) {

		$distance = 0;

		$origin['lat'] = sprintf("%.6f", round($origin['lat'], 6));
		$origin['long'] = sprintf("%.6f", round($origin['long'], 6));
		$destination['lat'] = sprintf("%.6f", round($destination['lat'], 6));
		$destination['long'] = sprintf("%.6f", round($destination['long'], 6));

		if($origin['lat'] AND $origin['long'] AND $destination['lat'] AND $destination['long']) {
			$cache_key = "origin:{$origin['lat']},{$origin['long']}&destination:{$destination['lat']},{$destination['long']}";
			$cache_lifetime = 6400;

			$distance = Cache::remember($cache_key, $cache_lifetime, function() use($distance, $origin, $destination) {

					$client = new Client();
			        $response = $client->request('GET', 'http://maps.googleapis.com/maps/api/directions/json', [
			            'query' => [
			                'origin' => "{$origin['lat']},{$origin['long']}",
							'destination' => "{$destination['lat']},{$destination['long']}",
							'avoid' => "tolls",
			            ]
			        ]);

					$directions = json_decode($response->getBody());

					if($directions->status == "OK") {
						foreach ($directions->routes as $route) {
							foreach ($route->legs as $leg) {
								$distance += $leg->distance->value;
							}
						}
					}

					return ($distance > 0) ? $distance / 1000 : 0;
				});

		}

		return $distance;
	}

}