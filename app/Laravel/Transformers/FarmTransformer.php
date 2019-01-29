<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\User;
use App\Laravel\Models\Farm;
use App\Laravel\Models\MetosForecast;

use League\Fractal\TransformerAbstract;
use Helper,Cache,Carbon,DB;

class FarmTransformer extends TransformerAbstract{

	protected $availableIncludes = [
        'owner', 'info', 'map', 'crops', 'status','daily_forecast','current_forecast','station','weekly_forecast'
    ];

	public function transform(Farm $farm){
		return [
			'id' => $farm->id ?:0,
			'name' => $farm->name,
			'size'	=> $farm->size,
			'station_id'	=> $farm->station_id,
			'start_date'	=> $farm->start_date,
			'start_date_display' => $farm->start_date ? Carbon::parse($farm->start_date)->format("M d Y") : "-"
		];
	}

	public function includeInfo(Farm $farm) {
		$collection = collect([
			'created_at' => [
				'date_db' => $farm->date_db($farm->created_at,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $farm->month_year($farm->created_at),
				'time_passed' => $farm->time_passed($farm->created_at),
				'timestamp' => $farm->created_at
			],
		]);
		return $this->item($collection, new MasterTransformer);
	}

	public function includeOwner(Farm $farm) {
		return $this->item(User::findOrNew($farm->user_id), new UserTransformer);
	}

	public function includeMap(Farm $farm) {
		return $this->collection($farm->map, new FarmMapTransformer);
	}

	public function includeCrops(Farm $farm) {
		return $this->collection($farm->crops, new FarmCropTransformer);
	}

	public function includeStation(Farm $farm) {

		$station = $farm->station;
		return $this->item($station, new StationTransformer);
	}

	public function includeStatus(Farm $farm) {
		$collection = collect([
			'low' => 0,
			'moderate' => 0,
			'critical' => 0,
		]);
		return $this->item($collection, new MasterTransformer);
	}

	public function includeDailyForecast(Farm $farm){
		$station = $farm->station;
		$station_id = $station->code;

        $date = Carbon::now()->format("Y-m-d");
        $current_hr = Carbon::now()->format("H");
        $next_day = Carbon::now()->addDay()->format("Y-m-d");

        $cache_key = base64_encode("metos.{$station_id}.{$date}.{$current_hr}");
		$forecast = Cache::get($cache_key);
		// dd($forecast);
		if(!$forecast){
			$forecast = Cache::remember($cache_key,60, function() use($station_id,$date,$cache_key,$current_hr,$next_day){ 
				return  MetosForecast::where('station_id',$station_id)
									->where(function($query) use($current_hr,$date,$next_day){
										return $query->where(function($query)use($current_hr,$date){
											return $query->whereRaw("HOUR(schedule) > {$current_hr}")
													->whereRaw("DATE(schedule) = '{$date}'");
										})
										->orWhere(function($query)use($current_hr,$next_day){
											$diff = 23-$current_hr;
											$next_range = 23-$diff > 10 ? 10 : 23-$diff;
											return $query->whereRaw("HOUR(schedule) < {$next_range}")
													->whereRaw("DATE(schedule) = '{$next_day}'");	
										});
									})
									
									->orderBy("schedule",'ASC')
									->orderBy("hour",'ASC')
									->get();
	        });
		}
		// dd(count($forecast));
		// $forecast = $station->metos()->daily_weather()->get();
		// dd($forecast);

		return $this->collection($forecast, new MetosTransformer);
	}

	public function includeWeeklyForecast(Farm $farm) {
		$station = $farm->station;
		$station_id = $station->code;

		$start = Carbon::now()->addDay()->format("Y-m-d");
		$end = Carbon::now()->addDays(6)->format("Y-m-d");

		// $forecast = MetosForecast::where('station_id',$station_id)
		// 				->whereRaw("DATE(schedule) >= '{$start}'")
		// 	            ->whereRaw("DATE(schedule) <= '{$end}'")
		// 	            ->where('hour','12')
		// 	            ->orderBy("schedule","ASC")->get();
        $cache_key = base64_encode("metos.{$station_id}.{$start}.{$end}");
		$forecast = Cache::get("metos.{$station_id}.{$start}.{$end}");
		if(!$forecast){
			$forecast = Cache::remember("metos.{$station_id}.{$start}.{$end}",60, function() use($station_id,$start,$end,$cache_key){ 
				$_metos=  MetosForecast::where('station_id',$station_id)
							->whereRaw("DATE(schedule) >= '{$start}'")
				            ->whereRaw("DATE(schedule) <= '{$end}'")
				            ->where('hour','12')
				            ->orderBy("schedule","ASC")
				            ->get();
				$_forecast_id = [];
				$current_record = "";

				foreach($_metos as $item => $f){
					if($current_record != Carbon::parse($f->schedule)->format("Y-m-d")){
						$current_record = Carbon::parse($f->schedule)->format("Y-m-d");
						// echo $current_record."<br>";
						array_push($_forecast_id, $f->id);
					}
				}

				// dd($_forecast_id);
				
				return MetosForecast::where('station_id',$station_id)
							->whereIn('id',$_forecast_id)
							->orderBy("schedule","ASC")
				            ->get();


			});
		}
		
		return $this->collection($forecast, new MetosTransformer);
	}


	public function includeCurrentForecast(Farm $farm){
		$station = $farm->station;
		$station_id = $station->code;

        $date = Carbon::now()->format("Y-m-d");
        $hr = Carbon::now()->format("G");
        $cache_key = base64_encode("metos.{$station_id}.{$date}.{$hr}");

		$forecast = Cache::get("metos.{$station_id}.{$date}.{$hr}");
		if(!$forecast){
			$forecast = Cache::remember("metos.{$station_id}.{$date}.{$hr}",60, function() use($station_id,$date,$hr,$cache_key){ 
				return  MetosForecast::where('station_id',$station_id)
									->whereRaw("DATE(schedule) = '{$date}'")
									->where("hour",$hr)
									->first();
			});

			if(!$forecast){
				$forecast = MetosForecast::where('station_id',$station_id)
									->whereRaw("DATE(schedule) = '{$date}'")
									->orderBy('hour',"DESC")
									->first();
				$forecast->hour = $hr;
				$forecast->schedule = "{$date} {$hr}:00:00";

			}
		}

		$forecast->min_temp = Cache::rememberForever("metos.{$station_id}.{$date}.min", function() use($station_id,$date){ 
				return MetosForecast::whereRaw("DATE(schedule) = '{$date}'")
			                    ->where('station_id',$station_id)
			                    ->min('temperature');

		});
		$forecast->max_temp = Cache::rememberForever("metos.{$station_id}.{$date}.max", function() use($station_id,$date){ 
				return MetosForecast::whereRaw("DATE(schedule) = '{$date}'")
			                    ->where('station_id',$station_id)
			                    ->max('temperature');
		});   


		// dd($this->item($forecast, new MetosTransformer));
		return $this->item($forecast, new MetosTransformer);
		
	}

}