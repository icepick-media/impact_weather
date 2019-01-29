<?php 

namespace App\Laravel\Events;

use Illuminate\Queue\SerializesModels;
use Mail,Str,Curl;

class SendSms extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(array $form_data)
	{
		$this->number =  $form_data['number'];
		$this->message =  $form_data['message'];
	}

	public function job(){

		Curl::to('http://beta.semaphore.co/api/v4/messages')
			->withData([ 
				'apikey' => "AQyPbT7wxBgMygqo52cY",
				'number' => $this->number,
				'message' => $this->message,
				'senderName'	=> "SEMAPHORE"
			])
			->post();
	}

}
