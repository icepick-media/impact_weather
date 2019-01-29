<?php

namespace App\Laravel\Controllers\Api\Auth;

use App\Laravel\Controllers\Controller;
use App\Laravel\Events\UserAction;
use App\Laravel\Models\AuthCode;
use App\Laravel\Models\User;
use App\Laravel\Models\RegistrantContact;

use App\Laravel\Requests\Api\Auth\RegisterRequest;
use App\Laravel\Requests\Api\Auth\V2RegisterRequest;

use App\Laravel\Transformers\TransformerManager;
use App\Laravel\Transformers\UserTransformer;
use Helper, JWTAuth, Str, Validator,Event,Carbon,Hash;

use App\Laravel\Events\SendSms;

class RegisterController extends Controller {

	protected $response = array();

	public function __construct() {
		$this->response = array(
			"msg" => "Bad Request.",
			"status" => FALSE,
			'status_code' => "BAD_REQUEST"
			);
		$this->response_code = 400;
		$this->transformer = new TransformerManager;
	}

	public function store(RegisterRequest $request, $format = '') {
		$registrant = RegistrantContact::where('contact_number', $request->get('contact'))->where('status', "yes")->first();
		if(!$registrant){
			$this->response['msg'] = Helper::get_response_message("INVALID_CONTACT");
			$this->response['status_code'] = "INVALID_CONTACT";
			goto callback;
		}

		$user = new User;
		$user->fill($request->all());

		$username = substr(Str::slug($user->name, ""), 0, 20);
		$user->username = Helper::create_username($user->name, User::where('username', 'like', "%" . $username . "%")->count());

		if(!$request->has('email')){
			$user->email = $user->username."@impactweather.com";
		}
		$user->password = bcrypt($user->contact);
		$user->allow_weather_station = $registrant->allow_weather_station;
		$user->save();

		$sms_code = mt_rand(1000,9999);

		$auth_code = new AuthCode;
		$auth_code->contact = $user->contact;
		$auth_code->code = Hash::make($sms_code);
		$auth_code->created_at = Carbon::now();
		$auth_code->save();

		if($request->get('send_sms','no') == "yes"){
			// SMS mas
			$notification_data = new SendSms(['number' => $user->contact,'message' => "Please use this Impact Weather Account Activation Code (IWAAC) {$sms_code} for activating account in your device."]);
			Event::fire('send-sms',$notification_data);

			$this->data['sms-notify'] = "Please use this Impact Weath Account Activation Code (IWAAC) {$sms_code} for activating account in your device.";
		}
		$this->response['msg'] = Helper::get_response_message("REGISTER_SUCCESS");
		$this->response['status'] = TRUE;
		$this->response['status_code'] = "REGISTER_SUCCESS";
		$this->response['data'] = $this->transformer->transform($user, new UserTransformer,'item');
		$this->response_code = 200;

		// $this->response['token'] = JWTAuth::fromUser($user, ['did' => $request->get('device_id')]);
		// $this->response['first_login'] = TRUE;

		event( new UserAction($user, ['register']) );

		callback:
		switch(Str::lower($format)){
			case 'json' :
				return response()->json($this->response, $this->response_code);
			break;
			case 'xml' :
				return response()->xml($this->response, $this->response_code);
			break;
		}
	}

	public function store_v2(V2RegisterRequest $request, $format = '') {
		$registrant = RegistrantContact::where('contact_number', $request->get('contact'))->where('status', "yes")->first();
		if(!$registrant){
			$this->response['msg'] = Helper::get_response_message("INVALID_CONTACT");
			$this->response['status_code'] = "INVALID_CONTACT";
			goto callback;
		}

		$user = new User;
		$user->fill($request->all());

		$username = substr(Str::slug($user->name, ""), 0, 20);
		$user->username = Helper::create_username($user->name, User::where('username', 'like', "%" . $username . "%")->count());

		if(!$request->has('email')){
			$user->email = $user->username."@impactweather.com";
		}
		$user->password = bcrypt($request->get('password'));
		$user->allow_weather_station = $registrant->allow_weather_station;
		$user->save();

		$sms_code = mt_rand(1000,9999);

		// $auth_code = new AuthCode;
		// $auth_code->contact = $user->contact;
		// $auth_code->code = Hash::make($sms_code);
		// $auth_code->created_at = Carbon::now();
		// $auth_code->save();

		// if($request->get('send_sms','no') == "yes"){
		// 	// SMS mas
		// 	$notification_data = new SendSms(['number' => $user->contact,'message' => "Please use this Impact Weather Account Activation Code (IWAAC) {$sms_code} for activating account in your device."]);
		// 	Event::fire('send-sms',$notification_data);

		// 	$this->data['sms-notify'] = "Please use this Impact Weath Account Activation Code (IWAAC) {$sms_code} for activating account in your device.";
		// }

		// Perform OAuth 2.0 authentication
		// Using Laravel Passport (Password Grant)
		$http = new \GuzzleHttp\Client;

		$response = $http->request('POST', url('/oauth/token'), [
            'http_errors' => false,
            'form_params' => [
                'grant_type'    => 'password',
                'client_id'     => $request->get('client_id'),
                'client_secret' => $request->get('client_secret'),
                'username'      => $user->contact,
                'password'      => $request->get('password'),
                'scope'         => "*",
            ]
        ]);

        if($response->getStatusCode() != 200) {
            $this->response['msg'] = Helper::get_response_message("LOGIN_FAILED");
			$this->response['status_code'] = "LOGIN_FAILED";
			goto callback;
        }   

        $token = json_decode((string) $response->getBody(), true);


		$this->response['msg'] = Helper::get_response_message("REGISTER_SUCCESS");
		$this->response['status'] = TRUE;
		$this->response['token'] = $token;

		$this->response['first_login'] = TRUE;

		$this->response['status_code'] = "REGISTER_SUCCESS";
		$this->response['data'] = $this->transformer->transform($user, new UserTransformer,'item');
		$this->response_code = 200;

		// $this->response['token'] = JWTAuth::fromUser($user, ['did' => $request->get('device_id')]);
		// $this->response['first_login'] = TRUE;

		event( new UserAction($user, ['register']) );

		callback:
		switch(Str::lower($format)){
			case 'json' :
				return response()->json($this->response, $this->response_code);
			break;
			case 'xml' :
				return response()->xml($this->response, $this->response_code);
			break;
		}
	}
}