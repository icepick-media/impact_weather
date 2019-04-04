<?php

namespace App\Laravel\Controllers\Api\Auth;

use App\Laravel\Controllers\Controller;
use App\Laravel\Events\UserAction;
use App\Laravel\Models\AuthCode;
use App\Laravel\Models\User;
use App\Laravel\Models\RegistrantContact;

use App\Laravel\Models\UserDevice;
use App\Laravel\Requests\Api\Auth\LoginRequest;
use App\Laravel\Transformers\TransformerManager;
use App\Laravel\Transformers\UserTransformer;
use Auth, JWTAuth, Helper, Str, Hash,Event,Input,Carbon;
use Illuminate\Http\Request;

use App\Laravel\Events\SendSms;

class LoginController extends Controller {

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

	public function resend_code(LoginRequest $request, $format) {
		$registrant = RegistrantContact::where('contact_number', $request->get('contact'))->where('status', "yes")->first();
		if(!$registrant){
			$this->response['msg'] = Helper::get_response_message("INVALID_CONTACT");
			$this->response['status_code'] = "INVALID_CONTACT";
			goto callback;
		}

		if(!$user = User::where('contact', $request->get('contact'))->where('type', "user")->first()) {
			$this->response['msg'] = Helper::get_response_message("INVALID_CONTACT");
			$this->response['status_code'] = "INVALID_CONTACT";
			goto callback;
		}

		$sms_code = mt_rand(1000,9999);

		$auth_code = new AuthCode;
		$auth_code->contact = $request->get('contact');
		$auth_code->code = Hash::make($sms_code);
		$auth_code->created_at = Carbon::now();
		$auth_code->save();

		if(Input::get('send_sms','no') == "yes"){
			// SMS Sender
			$notification_data = new SendSms(['number' => $request->get('contact'),'message' => "Please use this Impact Weather Account Activation Code (IWAAC) {$sms_code} for activating account in your device."]);
			Event::fire('send-sms',$notification_data);

			$this->data['sms-notify'] = "Please use this Impact Weather Account Activation Code (IWAAC) {$sms_code} for activating account in your device.";
		}else{
			$this->response['sms_code'] = $sms_code;
		}

		$this->response['msg'] = Helper::get_response_message("RESENT_CODE");
		$this->response['status'] = TRUE;
		$this->response['status_code'] = "RESENT_CODE";
		$this->response_code = 200;

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

	public function authenticate(LoginRequest $request, $format = '') {

		$contact = $request->get('contact');
		$code = $request->get('code');

		$user = User::where('contact', $contact)->first();

		if(!$user) {
			$this->response['msg'] = Helper::get_response_message("LOGIN_FAILED");
			$this->response['status_code'] = "LOGIN_FAILED";
			goto callback;
		}

		$auth_code = AuthCode::where('contact', $contact)->orderBy('created_at',"DESC")->first();
		
		if(!$auth_code OR ($auth_code AND !Hash::check($code, $auth_code->code))) {
			$this->response['msg'] = Helper::get_response_message("INVALID_AUTH_CODE");
			$this->response['status_code'] = "INVALID_AUTH_CODE";
			goto callback;
		}

		// Perform OAuth 2.0 authentication
		// Using Laravel Passport (Password Grant)
		$http = new \GuzzleHttp\Client;

		$response = $http->request('POST', url('/oauth/token'), [
            'http_errors' => false,
            'form_params' => [
                'grant_type'    => 'password',
                'client_id'     => 7,
                'client_secret' => 'SYD4aeeAabJ5qyVy0U5A9UImP2cAc1X2ISTUa5Ps',
                'username'      => $contact,
                'password'      => $contact,
                'scope'         => "*",
            ]
        ]);

        if($response->getStatusCode() != 200) {
            $this->response['msg'] = Helper::get_response_message("LOGIN_FAILED");
			$this->response['status_code'] = "LOGIN_FAILED";
			goto callback;
        }   

        $token = json_decode((string) $response->getBody(), true);
		AuthCode::where('contact', $contact)->delete();

		$this->response['msg'] = Helper::get_response_message("LOGIN_SUCCESS", ['name' => $user->name]);
		$this->response['status'] = TRUE;
		$this->response['status_code'] = "LOGIN_SUCCESS";
		$this->response['token'] = $token;
		// $this->response['token'] = JWTAuth::fromUser($user, ['did' => $request->get('device_id')]);
		$this->response['first_login'] = FALSE;
		$this->response['data'] = $this->transformer->transform($user, new UserTransformer,'item');
		$this->response_code = 200;

		if($user->is_activated == "no") {
			$this->response['first_login'] = TRUE;
			$user->is_activated = "yes";
			$user->save();
		}

		event( new UserAction($user, ['login']) );

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

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Post(
     *     path="/auth/v2/login.{format?}",
     *     description="Returns authentication parameters.",
     *     operationId="api.login.index",
     *     produces={"application/json", "application/xml"},
     *     tags={"Authentication"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
	 *     @SWG\Parameter(
	 *          name="contact",
	 *          description="Email or Contact",
	 *          required=true,
	 *          type="string",
	 *          in="query"
	 *     ),
	 *     @SWG\Parameter(
	 *          name="password",
	 *          description="Password",
	 *          required=true,
	 *          type="string",
	 *          in="query"
	 *     ),
	 *     @SWG\Parameter(
	 *          name="client_id",
	 *          description="Client ID",
	 *          type="string",
	 *          in="query"
	 *     ),
	 * 	   @SWG\Parameter(
	 *          name="client_secret",
	 *          description="Client Secret",
	 *          type="string",
	 *          in="query"
	 *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Country overview."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
	public function authenticate_v2(Request $request, $format = '') {

		$username = substr(Str::lower($request->get('contact')), -10);
		$password = $request->get('password');

		$field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'contact';
		
		$user = User::where($field,$username)
		->first();
		
		if(!$user){
			$this->response['msg'] = "Invalid contact number/password.";
			$this->response['status_code'] = "LOGIN_FAILED";
			goto invalid_login;
		}

		$uesrdata = array(
			$field => $username,
			'password' => $password
		);

		if ($user) {
			// $user = Auth::user();
			
			// Perform OAuth 2.0 authentication
			// Using Laravel Passport (Password Grant)
			$http = new \GuzzleHttp\Client;
			
			$response = $http->request('POST', url('/oauth/token'), [
				'http_errors' => false,
	            'form_params' => [
					'grant_type'    => 'password',
	                'client_id'     => $request->get('client_id') ? $request->get('client_id') : 3,
	                'client_secret' => $request->get('client_secret') ? $request->get('client_secret') : 'KrWdOMtrDzqNZkzjed1eUkEHnUrNOZoAsJL4Gv12',
	                'username'      => $username,
	                'password'      => $password,
	                'scope'         => "*",
					]
					]);

	        if($response->getStatusCode() != 200) {
	            $this->response['msg'] = Helper::get_response_message("LOGIN_FAILED");
				$this->response['status_code'] = "LOGIN_FAILED";
				goto callback;
	        }   

	        $token = json_decode((string) $response->getBody(), true);
			
			AuthCode::where('contact', $username)->delete();
			$this->response['msg'] = "Welcome, {$user->name}!";
			$this->response['status'] = TRUE;
			$this->response['status_code'] = "LOGIN_SUCCESS";
			$this->response['token'] = $token;
			$this->response['first_login'] = FALSE;
			$this->response['data'] = $this->transformer->transform($user, new UserTransformer,'item');
			$this->response_code = 200;

			event( new UserAction($user, ['login']) );

		} else {
			invalid_login:
			$this->response['msg'] = "Invalid contact number/password.";
			$this->response['status_code'] = "LOGIN_FAILED";
			$this->response_code = 401;
		}

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

	public function logout(Request $request, $format = '') {

		$user = $request->user();
		$user->save();

		$device_id = $request->get('device_id');
		UserDevice::where('device_id', $device_id)->where('user_id', $user->id)->update(['is_login' => "0"]);

		JWTAuth::invalidate(JWTAuth::getToken());

		$this->response['msg'] = Helper::get_response_message("LOGOUT_SUCCESS", ['name' => $user->name]);
		$this->response['status'] = TRUE;
		$this->response['status_code'] = "LOGOUT_SUCCESS";
		$this->response_code = 200;

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