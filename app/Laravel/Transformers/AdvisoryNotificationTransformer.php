<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\AdvisoryNotification;
use Helper, Carbon;
use League\Fractal\TransformerAbstract;

class AdvisoryNotificationTransformer extends TransformerAbstract{

	protected $availableIncludes = [
        'info'
    ];

	public function transform(AdvisoryNotification $notification){
		return [
			'id' => $notification->id ?:0,
			'content' => $notification->content,
			'created_at' => [
				'date_db' => $notification->date_db($notification->created_at,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $notification->month_year($notification->created_at),
				'time_passed' => $notification->time_passed($notification->created_at),
				'timestamp' => $notification->created_at
			],
		];
	}

}