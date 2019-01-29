<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\Advertisement;
use Helper, Carbon;
use League\Fractal\TransformerAbstract;

class AdvertisementTransformer extends TransformerAbstract{

	protected $availableIncludes = [
        'info'
    ];

	public function transform(Advertisement $ads){
		return [
			'id' => $ads->id ?:0,
			'web_link' => $ads->web_link,
			'image' => "{$ads->directory}/resized/{$ads->filename}",
		];
	}

	public function includeInfo(Advertisement $ads) {
		$collection = collect([
			'created_at' => [
				'date_db' => $ads->date_db($ads->created_at,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $ads->month_year($ads->created_at),
				'time_passed' => $ads->time_passed($ads->created_at),
				'timestamp' => $ads->created_at
			],
		]);
		return $this->item($collection, new MasterTransformer);
	}

}