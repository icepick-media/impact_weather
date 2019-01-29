<?php 

namespace App\Laravel\Transformers;

use Helper, Carbon, JWTAuth;
use App\Laravel\Models\Station;
use Illuminate\Support\Facades\Auth;
use App\Laravel\Models\MetosForecast;
use App\Laravel\Models\Recommendation;
use League\Fractal\TransformerAbstract;

class StationTransformer extends TransformerAbstract {


	protected $availableIncludes = [
        'info', 'location', 'current_weather', 
        'daily_weather', 'weekly_weather'
        // , 'recommendations'
    ];

	public function transform(Station $station){
		$user = Auth::user();
		$subscription = $user->subscriptions()->where('station_id', $station->id)->first();

		return [
			'id' => $station->id ?:0,
			'subscription_id' => $subscription ? $subscription->id : 0,
			'name' => $station->name,
			'code' => $station->code,
			'is_subscribed' => $subscription ? TRUE : FALSE,
			'is_nearby' => $station->is_nearby,
			'meteogram_image' => $station->meteogram_image
		];
	}

	public function includeInfo(Station $station) {
		$collection = collect([
			// 'image' => asset('weather/heavy_rain_showers.png'),
			// 'temperature' => "32 °C",
			// 'highest_temp' => "58 °C",
			// 'lowest_temp' => "28 °C",
			// 'duration' => "2 H",
			// 'status' => "low",
			// 'rain_amount' => "3.265 mm",
			// 'speed' => "25 km/h",
			'created_at' => [
				'date_db' => $station->date_db($station->created_at,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $station->month_year($station->created_at),
				'time_passed' => $station->time_passed($station->created_at),
				'timestamp' => $station->created_at
			],
		]);
		return $this->item($collection, new MasterTransformer);
	}

	public function includeLocation(Station $station) {
		$collection = collect([
			'distance' => $station->distance,
			'geo_lat' => $station->geo_lat,
			'geo_long' => $station->geo_long,
			'street_address' => $station->street_address,
			'city' => $station->city,
			'state' => $station->state,
			'country' => $station->country,
		]);
		return $this->item($collection, new MasterTransformer);
	}

	public function includeCurrentWeather(Station $station) {
		return ($forecast = $station->metos()->current_weather()->first())
					? $this->item($forecast, new MetosTransformer) 
					: $this->item(['id' => 0], new MasterTransformer);
	}

	public function includeDailyWeather(Station $station) {
		$forecast = $station->metos()->daily_weather()->get();
		return $this->collection($forecast, new MetosTransformer);
	}

	public function includeWeeklyWeather(Station $station) {
		$forecast = $station->metos()->weekly_weather()->orderBy("schedule","ASC")->get();
		return $this->collection($forecast, new MetosTransformer);
	}

	public function includeRecommendations(Station $station) {
		return ($forecast = $station->metos()->current_weather()->first())
			? $this->collection(Recommendation::criteria($forecast)->get(), new RecommendationTransformer)
			: $this->collection(array(), new MasterTransformer);
	}
}