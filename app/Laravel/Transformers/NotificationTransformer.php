<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\User;
use Helper;
use League\Fractal\TransformerAbstract;

class NotificationTransformer extends TransformerAbstract{

	protected $availableIncludes = [
        'user'
    ];

	public function transform($notification){
		return [
			'id' => $notification->id ?:0,
			'reference_id' => $notification->data['reference_id'],
			'type' => $notification->data['type'],
			'title' => $notification->data['title'],
			'content' => $notification->data['content'],
			'thumbnail' => $notification->data['thumbnail'],
			'is_read' => $notification->read_at != NULL ? "yes" : "no",
			'time_passed' => Helper::time_passed($notification->created_at),
		];
	}

	public function includeUser($notification) {
		return $this->item(User::findOrNew($notification->notifiable_id), new UserTransformer);
	}

}