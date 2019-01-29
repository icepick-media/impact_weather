<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\Recommendation;
use League\Fractal\TransformerAbstract;
use Helper;

class RecommendationTransformer extends TransformerAbstract{

	protected $availableIncludes = [];

	public function transform(Recommendation $recommendation){
		return [
			'title' => $recommendation->title,
			'content' => $recommendation->content,
			'type' => $recommendation->type,
			'image' => "/image.jpg",
		];
	}

}