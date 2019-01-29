<?php

namespace App\Laravel\Controllers\Metos;

use Illuminate\Http\Request;

use App\Laravel\Events\Metos\Forecast as ForecastEvent;
use App\Laravel\Events\Metos\Station as StationEvent;

use App\Laravel\Models\Farm;
use App\Laravel\Models\Station;

use App\Laravel\Models\MetosForecast;


use App\Laravel\Models\FarmMap;


use Carbon,Helper,Str,Event;
use GuzzleHttp\TransferStats;
use GuzzleHttp\Client as GuzzleClient;


class FetchController extends Controller
{
 	protected $data = array();

    public function __construct() {
        $this->response = array(
            "msg" => "Bad Request.",
            "status" => FALSE,
            'status_code' => "BAD_REQUEST"
            );
        $this->response_code = 400;
        // $this->transformer = new TransformerManager;
    }

    public function bind_farm($format = ''){
        $farms = Farm::where('station_id',"0")
                    ->where('remarks',"Searching for nearby station...")
                    ->get();
        $locations = [];
        foreach($farms as $index => $farm){
            $map = FarmMap::where('farm_id',$farm->id) 
                            ->first();


            if($map){
                array_push($locations, (object)['geo_lat' => $map->geo_lat,'geo_long' => $mag->get_long,'farm_id' => $map->farm_id]);
            }
        }

        if(count($locations) > 0 ){
            $event_data = new StationEvent(['locations' => $locations]);
            Event::fire('metos-bind', $event_data);
        }

        $this->response['locations'] = $locations;
        $this->response['msg'] = "Binding stations";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "BIND_STATION";
        // $this->response['data'] = $this->transformer->transform($crops, new CropTransformer, 'collection');
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

    public function fetch_meteo(Request $request, $format = ''){
        // $group_by = $request->get('group-by',"simpleWeatherRainSun");
        // $type = $request->get('type','stage');

        $stations = Station::all();

        foreach($stations as $index => $station){
            $station_id = $station->code;

            $group_by = "meteogram_agro";
            $type = "stage";
            $public_key = env("METOS_PUBLIC_KEY","70ad99b1c96075973cf6fb54a3916a1b3ac15eac");
            $private_key = env("METOS_PRIVATE_KEY","b2f8cac312eb11ed12b5d16523e75c7ccecbb7fb");

            // if($station = StationEvent::where('code', $station_id)->first()) {
                // $public_key = $station->public_key ?: $p_key;
                // $private_key = $station->private_key ?: $pr_key;
            // }

            $method = "GET";
            $method_request = "/forecast/{$station_id}/{$group_by}";

            $timestamp = gmdate('D, d M Y H:i:s T'); // Date as per RFC2616 - Wed, 25 Nov 2014 12:45:26 GMT

            $content_to_sign = $method.$method_request.$timestamp.$public_key;

            // Hash content to sign into HMAC signature
            $signature = hash_hmac("sha256", $content_to_sign, $private_key);

            // Add required headers
            // Authorization: hmac public_key:signature
            $headers = [
                "Accept: application/json",
                "Authorization: hmac {$public_key}:{$signature}",
                "Date: {$timestamp}"
            ];

            // Prepare and make https request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.fieldclimate.com" . $method_request);
            // SSL important
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $output = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($output);

            if(is_array($response)){
                $station->meteogram_image = $response[0];
                $station->save();
            }

        }

        // $this->response['station_id'] = $station_id;
        $this->response['msg'] = "Meteogram image fetch.";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "METEOGRAM_IMAGE_FETCH";
        // $this->response['data'] = $this->transformer->transform($crops, new CropTransformer, 'collection');
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

    public function fetch_weather(Request $request, $format = '') {

        // $per_page = $request->get('per_page', 10);
        // $page = $request->get('page', 1);
        // $crops = Crop::orderBy('name', "ASC")->get();

        $station_id = $request->get('station_id',"00203E97");

        // $stations = Station::all();

        // foreach($stations as $index => $station){
            // $station_id = $station->code;
            
            $this->response['msg'] = "Invalid station reference record.";
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "INVALID_STATION_ID";

            if($station_id){
                $_date = Carbon::now()->addDays(6)->format("Y-m-d H:00:00");

                $check_record = MetosForecast::where('station_id',$station_id)
                                    ->where('schedule',$_date)->first();
                if(!$check_record){
                    $event_data = new ForecastEvent(['station_id' => $station_id]);
                    Event::fire('metos-forecast', $event_data);
                }

                
            }
        // }

        // $this->response['station_id'] = $station_id;
        $this->response['msg'] = Helper::get_response_message("CROP_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "CROP_DATA_FETCH";
        // $this->response['data'] = $this->transformer->transform($crops, new CropTransformer, 'collection');
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

    public function weather(Request $request, $format = '') {

        // $per_page = $request->get('per_page', 10);
        // $page = $request->get('page', 1);
        // $crops = Crop::orderBy('name', "ASC")->get();
        // $stations = Station::all();

        // foreach($stations as $index => $station){
            // $station_id = $station->code;
            $station_id = $request->get('station_id',"00203E97");
            $group_by = $request->get('group-by',"simpleWeatherRainSun");
            $type = $request->get('type','stage');
            
            $this->response['msg'] = "Invalid station reference record.";
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "INVALID_STATION_ID";


            if($station_id){
                $public_key = env("METOS_PUBLIC_KEY","70ad99b1c96075973cf6fb54a3916a1b3ac15eac");
                $private_key = env("METOS_PRIVATE_KEY","b2f8cac312eb11ed12b5d16523e75c7ccecbb7fb");

                // if($station = Station::where('code', $station_id)->first()) {
                //     $public_key = $station->public_key ?: $p_key;
                //     $private_key = $station->private_key ?: $pr_key;
                // }

                $method = "GET";
                $method_request = "/forecast/{$station_id}/{$group_by}";

                $timestamp = gmdate('D, d M Y H:i:s T'); // Date as per RFC2616 - Wed, 25 Nov 2014 12:45:26 GMT

                $content_to_sign = $method.$method_request.$timestamp.$public_key;

                // Hash content to sign into HMAC signature
                $signature = hash_hmac("sha256", $content_to_sign, $private_key);

                // Add required headers
                // Authorization: hmac public_key:signature
                $headers = [
                    "Accept: application/json",
                    "Authorization: hmac {$public_key}:{$signature}",
                    "Date: {$timestamp}"
                ];

                // Prepare and make https request
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://api.fieldclimate.com" . $method_request);
                // SSL important
                curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $output = curl_exec($ch);
                curl_close($ch);

                $this->response['response'] = json_decode($output);
                // $this->response['station_id'] = $station_id;
                // // $this->response['msg'] = Helper::get_response_message("CROP_DATA");
                // $this->response['status'] = TRUE;
                // $this->response['status_code'] = "CROP_DATA";

                if($response = $this->response['response']){
                    $event_data = new ForecastEvent(['response' => $this->response['response'],'station_id' => $station_id]);
                    Event::fire('metos-forecast', $event_data);

                    // dd($response);
                    

                }
            }
        // }

    	// $this->response['data'] = $this->transformer->transform($crops, new CropTransformer, 'collection');
        // $this->response['response'] = "";
        $this->response['msg'] = "Forecast fetch.";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "CROP_DATA";
    	$this->response_code = 200;
        // dd(json_decode($output));


            
        


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
