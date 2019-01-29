<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\Farm;
use App\Laravel\Models\FarmCrop;
use App\Laravel\Models\Recommendation;
use App\Laravel\Models\Station;
use Helper;

use Illuminate\Support\Collection;
use League\Fractal\TransformerAbstract;

class FarmCropTransformer extends TransformerAbstract{

	protected $availableIncludes = [
		'farm', 'journals', 'activity'
		// 'recommendations',
	];

	public function transform(FarmCrop $crop){
		return [
			// 'id' => $crop->id ?:0,
			'name' => $crop->name,
			'farm_id' => $crop->farm_id,
			'variety' => $crop->variety,
		];
	}

	public function includeFarm(FarmCrop $crop) {
		return $this->item(Farm::findOrNew($crop->farm_id), new FarmTransformer);
	}

	public function includeJournals(FarmCrop $crop) {
		return $this->collection($crop->journals, new JournalTransformer);
	}

	public function includeRecommendations(FarmCrop $crop) {
		$station = Station::findOrNew($crop->farm ? $crop->farm->station_id : 0);
		return ($forecast = $station->metos()->current_weather()->first())
			? $this->collection(Recommendation::criteria($forecast)->get(), new RecommendationTransformer)
			: $this->collection(array(), new MasterTransformer);
	}

	public function includeActivity(){
		$collection = Collection::make([
					['id'	=> 1, 'name'	=> "Land Preparation"],
					['id'	=> 2, 'name'	=> "Seeding"],
					['id'	=> 3, 'name'	=> "Fetilizer Application"],
					['id'	=> 4, 'name'	=> "Harvesting"],
			]);
		return $collection;
	}

}