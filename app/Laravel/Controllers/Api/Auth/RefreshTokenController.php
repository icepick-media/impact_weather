<?php

namespace App\Laravel\Controllers\Api\Auth;

use Helper, Str;
use Illuminate\Http\Request;
use App\Laravel\Controllers\Controller;
use App\Laravel\Transformers\TransformerManager;
use App\Laravel\Requests\Api\Auth\RefreshTokenRequest;

class RefreshTokenController extends Controller {

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

	public function refresh(RefreshTokenRequest $request, $format = '') {
		
		$http = new \GuzzleHttp\Client;

        $response = $http->request('POST', url('/oauth/token'), [
            'http_errors' => false,
            'form_params' => [
                'grant_type'    => 'refresh_token',
                'client_id'     => $request->get('client_id'),
                'client_secret' => $request->get('client_secret'),
                'refresh_token' => $request->get('refresh_token'),
                'scope'         => "*",
            ]
        ]);

        if($attempt = $response->getStatusCode() != 200) {
	        $this->response['msg'] = Helper::get_response_message("TOKEN_INVALID");
	        $this->response['status'] = FALSE;
	        $this->response['status_code'] = "TOKEN_INVALID";
	        goto callback;
        }

        $token = json_decode((string) $response->getBody(), true);
        
		$this->response['msg'] = Helper::get_response_message("NEW_TOKEN");
		$this->response['status'] = TRUE;
		$this->response['status_code'] = "NEW_TOKEN";
		$this->response['token'] = $token;
		$this->response['user'] = $this->user($request, $token['access_token']);
		
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

	public function user($request, $token) {
		$http = new \GuzzleHttp\Client;

        $response = $http->request('GET', route('api.profile.show', ['json']), [
            'headers' => [ 'Authorization' => "Bearer {$token}" ],
            'query' => [ 'include' => $request->get('include') ]
        ]);

        return json_decode((string) $response->getBody(), true)['data'];
	}
}