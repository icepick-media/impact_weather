<?php

namespace App\Laravel\Controllers\Api;

use App\Laravel\Models\VersionControl;
use App\Laravel\Models\Advertisement;
use App\Laravel\Models\Advisory;
use App\Laravel\Models\AdvisoryNotification;

use App\Laravel\Models\FarmActivity;

use App\Laravel\Transformers\MasterTransformer;
use App\Laravel\Transformers\AdvertisementTransformer;
use App\Laravel\Transformers\AdvisoryNotificationTransformer;

use App\Laravel\Transformers\TransformerManager;

use App\Laravel\Requests\Api\AdvisoryRequest;
use Illuminate\Http\Request;
use Str, Carbon, DB, Helper,ImageUploader,GeoIP,Input;


/**
 * Class AppSettingController
 *
 * @package App\Http\Controllers
 *
 * @SWG\Swagger(
 *     basePath="/api",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="1.0",
 *         title="WaveOne API",
 *         @SWG\Contact(name="Aneep Tandel", url="https://github.com/aneepct"),
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */
class AppSettingController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->response = array(
            "msg" => "Bad Request.",
            "status" => FALSE,
            'status_code' => "BAD_REQUEST"
            );
        $this->response_code = 400;
        $this->transformer = new TransformerManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/advisory.{format?}",
     *     description="Returns app settings.",
     *     operationId="api.get_country",
     *     produces={"application/json", "application/xml"},
     *     tags={"App Settings"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="App Settings."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function advisory(Request $request, $format = ''){
        $user = $request->user();
        $user_id = 0;
        if($user){
            $user_id = $user->id;
        }

        $farm_id = Input::get('farm_id','0');


        $advisory = AdvisoryNotification::where(function($query) use($user_id){
                        return $query->where('user_id','0')
                                    ->where('farm_id','0');
                })
                ->orWhere(function($query) use($farm_id,$user_id){
                    return $query->where('user_id',$user_id)
                            ->where(function($q) use($farm_id){
                                return $q->where('farm_id','0')
                                        ->orWhere('farm_id',$farm_id);
                            });
                })
        ->where('status','published')->orderBy('created_at',"DESC")->get();

        $this->response['msg'] = "App Advisory";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "APP_ADVISORY";
        $this->response['num_advisory'] = $advisory->count();
        $this->response['advisory_display'] = "{$this->response['num_advisory']} New Notifications!";
        $this->response['data'] = $this->transformer->transform($advisory, new AdvisoryNotificationTransformer, 'collection');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/app-settings.{format?}",
     *     description="Returns app settings.",
     *     operationId="api.index",
     *     produces={"application/json", "application/xml"},
     *     tags={"App Settings"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="App Settings."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function index(Request $request, $format = '') {

        $data = [
            'latest_version' => VersionControl::orderBy('created_at', "DESC")->first() ? : new VersionControl,
            'farm_activity' => FarmActivity::select('id',DB::raw('name AS title'),'code')->get()->toArray(),
            'crops' => [
                'id' => 1,'name' => "Corn", 'variety' => "Normal Sugary,Sugary Enhancer,Supersweet,Other",
                'id' => 2, 'name' => "Rice", 'variety' => "PSB RC2(NAHALIN),PSB RC2(MOLAWIN),NSIC RC396 (TUBIGAN 33),Other",
            ],
        ];

        // dd(FarmActivity::select('id','name','code')->get()->toArray());

        $ads = Advertisement::where('status','published')->inRandomOrder()->first();

        if(!$ads){
            $ads = new Advertisement;
            $ads->id = 0;
        }

        $this->response['msg'] = "App Settings";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "APP_SETTINGS";
        $this->response['data'] = $this->transformer->transform($data, new MasterTransformer, 'item');
        $this->response['ads'] = $this->transformer->transform($ads, new AdvertisementTransformer, 'item');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/get-country.{format?}",
     *     description="Returns country overview.",
     *     operationId="api.country.index",
     *     produces={"application/json", "application/xml"},
     *     tags={"Get Country"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
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
    public function get_country(Request $request, $format = ''){

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }


        $location = GeoIP::getLocation($ip);
        $data = [
            'ip' =>  $location->ip,
            'city'  => $location->city,
            'state'  => $location->state_name,
            'lat'   => $location->lat,
            'long'  => $location->lon,
            'country' =>  $location->iso_code,
            'country_name' =>  $location->country,
            'country_currency'  => $location->currency,
            'timezone' =>  $location->timezone,
        ];

        $this->response['msg'] = "Current location details";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "CURRENT_LOCATION";
        $this->response['data'] = $this->transformer->transform($data, new MasterTransformer, 'item');
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

    public function send_advisory(AdvisoryRequest $request, $format = ''){
        $user = $request->user();
        $new_advisory = new Advisory;
        $new_advisory->fill($request->only('content'));
        $new_advisory->user_id =  $user->id;

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/advisories");
            $new_advisory->path = $img['path'];
            $new_advisory->directory = $img['directory'];
            $new_advisory->filename = $img['filename'];
        }

        if($request->has('farm_id')){
            $new_advisory->farm_id = $request->get('farm_id');
        }
        $new_advisory->save();

        $this->response['msg'] = "Inquiry Sent! Our support team will get back to you soon.";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "INQUIRY_SENT";
        $this->response_code = 201;

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
