<?php

namespace App\Laravel\Controllers\Api;

use App\Laravel\Models\Farm;
use App\Laravel\Models\FarmCrop;
use App\Laravel\Models\FarmMap;

use App\Laravel\Models\Station;
use App\Laravel\Models\User;
use App\Laravel\Requests\Api\FarmCropRequest;
use App\Laravel\Requests\Api\FarmRequest;
use App\Laravel\Transformers\FarmTransformer;
use App\Laravel\Transformers\TransformerManager;
use Illuminate\Http\Request;
use ImageUploader, Str, Helper,Cache,Carbon;

class FarmController extends Controller
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

    public function index(Request $request, $format = '') {

        $data = $request->all();
        $user = User::where('id', $data['user_id'])->first();
        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);
        
        $farms = $user->farms()->paginate($per_page);

        $this->response['msg'] = Helper::get_response_message("FARM_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_DATA";
        $this->response['has_morepages'] = $farms->hasMorePages();
        $this->response['data'] = $this->transformer->transform($farms, new FarmTransformer, 'collection');
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

        $farm = $request->get('farm_data');

        // $this->response['msg'] = Helper::get_response_message("FARM_INFO");
        $this->response['msg'] = "Farm : {$farm->name} loaded.";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_INFO";
        $this->response['data'] = $this->transformer->transform($farm, new FarmTransformer, 'item');
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

    public function store(FarmRequest $request, $format = '') {

        $user = $request->user();

        $farm = new Farm;
        $farm->fill($request->all());
        $farm->user_id = $user->id;
        $farm->station_id = 0;
        if($request->has('start_date')){
            $farm->start_date = Carbon::parse($request->get('start_date'))->format("Y-m-d");
        }
        $farm->remarks = "Searching for a nearby station...";
        $farm->save();

        $farm->updateMap($request->get('map'));
        $farm->updateCrops($request->get('crops'));
        $first_farm = Farm::where('user_id',$user->id)->orderBy('created_at','ASC')->first();

        $this->response['default_farm_id'] = $first_farm ? $first_farm->id : "0";
        $this->response['msg'] = Helper::get_response_message("FARM_CREATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_CREATED";
        $this->response['data'] = $this->transformer->transform($farm, new FarmTransformer, 'item');
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

    public function update(FarmRequest $request, $format = '') {

        $user = $request->user();
        $farm = $request->get('farm_data');

        if($farm->user_id != $user->id) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_FARM_EDIT");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_FARM_EDIT";
            $this->response_code = 401;
            goto callback;
        }

        $farm->fill($request->all());
        $farm->station_id = 0;
        if($request->has('start_date')){
            $farm->start_date = Carbon::parse($request->get('start_date'))->format("Y-m-d");
        }
        $farm->remarks = "Searching for a nearby station...";
        $farm->save();

        $farm->map()->delete();
        $farm->crops()->delete();
        
        $farm->updateMap($request->get('map'));
        $farm->updateCrops($request->get('crops'));

        $this->response['msg'] = Helper::get_response_message("FARM_UPDATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_UPDATED";
        $this->response['data'] = $this->transformer->transform($farm, new FarmTransformer, 'item');
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

    public function update_crops(FarmCropRequest $request, $format = '') {

        $user = $request->user();
        $farm = $request->get('farm_data');

        if($farm->user_id != $user->id) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_FARM_EDIT");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_FARM_EDIT";
            $this->response_code = 401;
            goto callback;
        }

        $farm->crops()->delete();
        $farm->updateCrops($request->get('crops'));

        $this->response['msg'] = Helper::get_response_message("FARM_UPDATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_UPDATED";
        $this->response['data'] = $this->transformer->transform($farm, new FarmTransformer, 'item');
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
     *     path="/farms/delete.{format?}",
     *     description="Remove a farm.",
     *     operationId="api.farm.destroy",
     *     produces={"application/json", "application/xml"},
     *     tags={"Farms"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="farm_data",
     *         in="query",
     *         type="string",
     *         description="Farm object to remove.",
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
    public function destroy(Request $request, $format = '') {

        $user = $request->user();
        $farm = $request->get('farm_data');

        if($farm->user_id != $user->id) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_FARM_DELETE");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_FARM_DELETE";
            $this->response_code = 401;
            goto callback;
        }

        $farm->delete();
        Cache::forget("user.{$user->id}.def_farm");

        $first_farm = Farm::where('user_id',$user->id)->orderBy('created_at','ASC')->first();

        $this->response['default_farm_id'] = $first_farm ? $first_farm->id : "0";
        $this->response['msg'] = Helper::get_response_message("FARM_DELETED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_DELETED";
        $this->response['data'] = $this->transformer->transform($farm, new FarmTransformer, 'item');

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
