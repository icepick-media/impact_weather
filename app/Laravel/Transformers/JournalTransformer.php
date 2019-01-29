<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\Farm;
use App\Laravel\Models\FarmCrop;
use App\Laravel\Models\Journal;
use Helper, Carbon;
use League\Fractal\TransformerAbstract;

class JournalTransformer extends TransformerAbstract{

	protected $availableIncludes = [
        'info', 'farm'
    ];

	public function transform(Journal $journal){
		return [
			'id' => $journal->id ?:0,
			'title' => $journal->title,
			'crop' => $journal->crop,
			'entry_date' => $journal->date_only($journal->entry_date),
			'entry_date_db' => $journal->date_db($journal->entry_date,env("MASTER_DB_DRIVER","mysql")),
			'status' => $journal->status,
			'start_time' => Helper::date_format(Carbon::now()->format("Y-m-d")." {$journal->start_time}","h:i A"),
			'end_time' => Helper::date_format(Carbon::now()->format("Y-m-d")." {$journal->end_time}","h:i A"),
			'qty' => $journal->qty > 0 ? $journal->qty : "",
			'brand' => $journal->brand,

		];
	}

	public function includeInfo(Journal $journal) {
		$collection = collect([
			'created_at' => [
				'date_db' => $journal->date_db($journal->created_at,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $journal->month_year($journal->created_at),
				'time_passed' => $journal->time_passed($journal->created_at),
				'timestamp' => $journal->created_at
			],
			'entry_date' => [
				'date_db' => $journal->date_db($journal->entry_date,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $journal->month_year($journal->entry_date),
				'time_passed' => $journal->time_passed($journal->entry_date),
				'timestamp' => $journal->entry_date
			],
		]);
		return $this->item($collection, new MasterTransformer);
	}

	public function includeFarm(Journal $journal) {
		return $this->item(Farm::findOrNew($journal->farm_id), new FarmTransformer);
	}

}