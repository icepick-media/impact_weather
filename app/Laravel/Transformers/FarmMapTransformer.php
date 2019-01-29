<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\FarmMap;
use League\Fractal\TransformerAbstract;
use Helper;

class FarmMapTransformer extends TransformerAbstract{

	protected $availableIncludes = [];

	public function transform(FarmMap $map){
		return [
			// 'id' => $map->id ?:0,
			'geo_lat' => $map->geo_lat,
			'geo_long' => $map->geo_long,
		];
	}

}