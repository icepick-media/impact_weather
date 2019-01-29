<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\Station;
use App\Laravel\Models\Subscription;
use Helper, Carbon;
use League\Fractal\TransformerAbstract;

class SubscriptionTransformer extends TransformerAbstract{

	protected $availableIncludes = [
        'station'
    ];

	public function transform(Subscription $subscription){
		return [
			'id' => $subscription->id ?:0,
			'type' => $subscription->type,
			'status' => $subscription->status,
		];
	}

	public function includeInfo(Subscription $subscription) {
		$collection = collect([
			'created_at' => [
				'date_db' => $subscription->date_db($subscription->created_at,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $subscription->month_year($subscription->created_at),
				'time_passed' => $subscription->time_passed($subscription->created_at),
				'timestamp' => $subscription->created_at
			],
		]);
		return $this->item($collection, new MasterTransformer);
	}

	public function includeStation(Subscription $subscription) {
		return $this->item(Station::findOrNew($subscription->station_id), new StationTransformer);
	}

}