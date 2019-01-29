<?php 

namespace App\Laravel\Transformers;

use App\Laravel\Models\User;

use Illuminate\Support\Collection;
use App\Laravel\Transformers\MasterTransformer;
use League\Fractal\TransformerAbstract;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserTransformer extends TransformerAbstract{

	protected $availableIncludes = [
        'info',
    ];

	public function transform(User $user) {
	     return [
	     	'id' => $user->id ?:0,
	     	'default_farm_id'	=> $user->default_farm_id,
	     	'num_farm'	=> $user->num_farm >= 3 ? 3 : $user->num_farm,
	     	'name' => $user->name,
	     	'username' => $user->username,
			'email' => $user->email,
			'contact' => $user->contact,
			'allow_weather_station' => $user->allow_weather_station,
			'fb_id' => $user->facebook ? $user->facebook->provider_user_id : NULL,
			'image' => "{$user->directory}/resized/{$user->filename}",
	     ];
	}


	public function includeInfo(User $user) {
		$collection = Collection::make([
			'member_since' => [
				'date_db' => $user->date_db($user->created_at,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $user->month_year($user->created_at),
				'time_passed' => $user->time_passed($user->created_at),
				'timestamp' => $user->created_at
			],
			'last_activity' => [
				'date_db' => $user->date_db($user->last_activity,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $user->month_year($user->last_activity),
				'time_passed' => $user->time_passed($user->last_activity),
				'timestamp' => $user->last_activity
			],
	     	'last_login' => [
				'date_db' => $user->date_db($user->last_login,env("MASTER_DB_DRIVER","mysql")),
				'month_year' => $user->month_year($user->last_login),
				'time_passed' => $user->time_passed($user->last_login),
				'timestamp' => $user->last_login
			],
			'avatar' => [
				'path' => $user->directory,
	 			'filename' => $user->filename,
	 			'path' => $user->path,
	 			'directory' => $user->directory,
	 			'full_path' => "{$user->directory}/resized/{$user->filename}",
	 			'thumb_path' => "{$user->directory}/thumbnails/{$user->filename}",
			],
		]);
		return $this->item($collection, new MasterTransformer);
	}
}