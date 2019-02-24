<?php

namespace App\Laravel\Middleware\Api;

use App\Laravel\Models\Farm;
use App\Laravel\Models\FarmActivity;
use App\Laravel\Models\FarmCrop;
use App\Laravel\Models\Journal;
use App\Laravel\Models\Station;
use App\Laravel\Models\Subscription;
use App\Laravel\Models\User;
use Closure, Helper;

class ExistRecord
{

    protected $format;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $record
     * @return mixed
     */
    public function handle($request, Closure $next, $record)
    {
        $this->format = $request->format;
        $response = array();

        switch (strtolower($record)) {
            case 'user':
                if(! $this->_exist_user($request)) {
                    $response = [
                        'msg' => Helper::get_response_message("USER_NOT_FOUND"),
                        'status' => FALSE,
                        'status_code' => "USER_NOT_FOUND",
                        'hint' => "Make sure the 'user_id' from your request parameter is existing and valid."
                    ];
                }
            break;
            case 'notification':
                if(! $this->_exist_notification($request)) {
                    $response = [
                        'msg' => Helper::get_response_message("NOTIFICATION_NOT_FOUND"),
                        'status' => FALSE,
                        'status_code' => "NOTIFICATION_NOT_FOUND",
                        'hint' => "Make sure the 'notification_id' from your request parameter is existing and valid."
                    ];
                }
            break;
            case 'farm':
                if(! $this->_exist_farm($request)) {
                    $response = [
                        'msg' => Helper::get_response_message("FARM_NOT_FOUND"),
                        'status' => FALSE,
                        'status_code' => "FARM_NOT_FOUND",
                        'hint' => "Make sure the 'farm_id' from your request parameter is existing and valid."
                    ];
                }
            break;
            case 'farm_activity':
                if( !$this->_exist_farm_activity($request) ) {
                    $response = [
                        'msg' => Helper::get_response_message("FARM_ACTIVITY_NOT_FOUND"),
                        'status' => FALSE,
                        'status_code' => "FARM_ACTIVITY_NOT_FOUND",
                        'hint' => "Make sure the 'farm_activity_id' from your request parameter is existing and valid."
                    ];
                }
            break;
            case 'journal':
                if(! $this->_exist_journal($request)) {
                    $response = [
                        'msg' => Helper::get_response_message("JOURNAL_NOT_FOUND"),
                        'status' => FALSE,
                        'status_code' => "JOURNAL_NOT_FOUND",
                        'hint' => "Make sure the 'journal_id' from your request parameter is existing and valid."
                    ];
                }
            break;
            case 'station':
                if(! $this->_exist_station($request)) {
                    $response = [
                        'msg' => Helper::get_response_message("STATION_NOT_FOUND"),
                        'status' => FALSE,
                        'status_code' => "STATION_NOT_FOUND",
                        'hint' => "Make sure the 'station_id' from your request parameter is existing and valid."
                    ];
                }
            break;
            case 'subscription':
                if(! $this->_exist_subscription($request)) {
                    $response = [
                        'msg' => Helper::get_response_message("SUBSCRIPTION_NOT_FOUND"),
                        'status' => FALSE,
                        'status_code' => "STATION_NOT_FOUND",
                        'hint' => "Make sure the 'subscription_id' from your request parameter is existing and valid."
                    ];
                }
            break;
        }

        if(empty($response)) {
            return $next($request);
        }

        switch ($this->format) {
            case 'json':
                return response()->json($response, 404);
            break;
            case 'xml':
                return response()->xml($response, 404);
            break;
        }
    }


    private function _exist_user($request) {
        $user = User::where('type', "user")->find( $request->get('user_id') );
        
        if($user) {
            $request->merge(['user_data' => $user]);
            return TRUE;
        }

        return FALSE;
    }

    private function _exist_notification($request) {
        $notification = $request->auth->notifications()->where('id', $request->get('notification_id'))->first();
        
        if($notification) {
            $request->merge(['notification_data' => $notification]);
            return TRUE;
        }

        return FALSE;
    }

    private function _exist_farm($request) {
        $auth = $request->user();
        $farm = Farm::find( $request->get('farm_id',$auth->default_farm_id) );
        
        if($farm) {
            $request->merge(['farm_data' => $farm]);
            return TRUE;
        }

        return FALSE;
    }

    private function _exist_farm_activity($request) {
        $farm_acitivity = FarmActivity::where('id', $request->get('farm_activity_id'))->first();
        
        if($farm_acitivity) {
            $request->merge(['farm_activity_data' => $farm_acitivity]);
            return TRUE;
        }

        return FALSE;
    }

    private function _exist_journal($request) {
        $journal = Journal::find( $request->get('journal_id') );
        
        if($journal) {
            $request->merge(['journal_data' => $journal]);
            return TRUE;
        }

        return FALSE;
    }

    private function _exist_station($request) {
        $station = Station::find( $request->get('station_id') );
        
        if($station) {
            $request->merge(['station_data' => $station]);
            return TRUE;
        }

        return FALSE;
    }

    private function _exist_subscription($request) {
        $subscription = Subscription::find( $request->get('subscription_id') );
        
        if($subscription) {
            $request->merge(['subscription_data' => $subscription]);
            return TRUE;
        }

        return FALSE;
    }
    
}