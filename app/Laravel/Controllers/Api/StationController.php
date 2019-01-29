<?php 

namespace App\Laravel\Controllers\Api;

use App\Laravel\Models\Station;
use App\Laravel\Requests\Api\SearchRequest;
use App\Laravel\Transformers\TransformerManager;
use App\Laravel\Transformers\StationTransformer;
use Illuminate\Http\Request;
use Helper, Str;

class StationController extends Controller{

    protected $response = array();

    public function __construct(){
        $this->response = array(
            "msg" => "Bad Request.",
            "status" => FALSE,
            'status_code' => "BAD_REQUEST"
            );
        $this->response_code = 400;
        $this->transformer = new TransformerManager;
    }

    public function index(Request $request, $format = '') {

        $user = $request->user();
        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);

        $stations = Station::active()->paginate($per_page);

        $this->response['msg'] = Helper::get_response_message("STATION_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "STATION_DATA";
        $this->response['has_morepages'] = $stations->hasMorePages();
        $this->response['data'] = $this->transformer->transform($stations, new StationTransformer, 'collection');
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

    public function owned(Request $request, $format = '') {

        $user = $request->user();
        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);

        $subscriptions = $user->subscriptions;
        $stations = Station::active()->whereIn('id', $subscriptions->pluck('station_id'))->paginate($per_page);
        // $stations = Station::active()->whereIn('id', $user->farms->pluck('station_id'))->paginate($per_page);

        $this->response['msg'] = Helper::get_response_message("STATION_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "STATION_DATA";
        $this->response['has_morepages'] = $stations->hasMorePages();
        $this->response['data'] = $this->transformer->transform($stations, new StationTransformer, 'collection');
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

    public function nearby(Request $request, $format = '') {

        $user = $request->user();
        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);

        $user_lat = $request->get('user_lat');
        $user_long = $request->get('user_long');
        //->nearby($user_lat, $user_long)
        $stations = Station::active()->get();

        $this->response['msg'] = Helper::get_response_message("STATION_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "STATION_DATA";
        // $this->response['has_morepages'] = $stations->hasMorePages();
        $this->response['data'] = $this->transformer->transform($stations, new StationTransformer, 'collection');
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

    public function show(Request $request, $format = '') {
        
        $station = $request->get('station_data');

        $this->response['msg'] = Helper::get_response_message("STATION_INFO");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "STATION_INFO";
        $this->response['data'] = $this->transformer->transform($station, new StationTransformer, 'item');
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