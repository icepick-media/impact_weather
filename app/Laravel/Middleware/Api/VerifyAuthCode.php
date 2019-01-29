<?php

namespace App\Laravel\Middleware\Api;

use App\Laravel\Models\AuthCode;
use App\Laravel\Services\ResponseManager;
use Closure, Helper, Carbon;

class VerifyAuthCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $auth_code = AuthCode::where('contact', $request->get('contact'))->first();

        if(!$auth_code) {
            return response()->json([
                'msg' => Helper::get_response_message("LOGIN_FAILED"),
                'status' => FALSE,
                'status_code' => "LOGIN_FAILED",
            ], 401);
        }

        if(Carbon::parse($auth_code->created_at)->addMinutes(60)->isPast()) {
            return response()->json([
                'msg' => Helper::get_response_message("INVALID_AUTH_CODE"),
                'status' => FALSE,
                'status_code' => "INVALID_AUTH_CODE",
            ], 401);
        }

        $request->merge(['auth_code' => $auth_code]);
        return $next($request);
    }
    
}