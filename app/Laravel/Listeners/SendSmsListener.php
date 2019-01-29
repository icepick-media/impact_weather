<?php 

namespace App\Laravel\Listeners;

use App\Laravel\Events\SendSms;

class SendSmsListener{

	public function handle(SendSms $sms){
		$sms->job();
	}
}