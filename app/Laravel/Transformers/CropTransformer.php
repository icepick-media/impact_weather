<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\Crop;
use League\Fractal\TransformerAbstract;
use Helper;

class CropTransformer extends TransformerAbstract{

	protected $availableIncludes = [];

	public function transform(Crop $crop){
		return [
			'name' => $crop->name,
			'code' => $crop->code,
			'variety' => explode(",", $crop->variety),
			'status' => $crop->status,

		];
	}

}