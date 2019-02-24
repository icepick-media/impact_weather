<?php

namespace App\Laravel\Controllers\Api;

use App\Laravel\Models\Farm;
use App\Laravel\Models\FarmActivity;
use App\Laravel\Models\FarmMap;

use App\Laravel\Models\Station;
use App\Laravel\Models\User;
use App\Laravel\Requests\Api\FarmActivityRequest;
use App\Laravel\Requests\Api\FarmRequest;
use App\Laravel\Transformers\FarmTransformer;
use App\Laravel\Transformers\TransformerManager;
use Illuminate\Http\Request;
use ImageUploader, Str, Helper,Cache,Carbon;

class FarmActivityController extends Controller
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
     *     path="/farm_activity/all.{format?}",
     *     description="Returns all farm activities.",
     *     operationId="api.farm_activity.index",
     *     produces={"application/json", "application/xml"},
     *     tags={"Farm Activities"},
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
        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);
        
        $farm_activites = FarmActivity::paginate($per_page);

        $this->response['msg'] = Helper::get_response_message("FARM_ACTIVITY_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_DATA";
        $this->response['has_morepages'] = $farm_activites->hasMorePages();
        $this->response['data'] = $farm_activites->toArray();
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
     *     path="/farm_activity/{id}/get_activity.{format?}",
     *     description="Returns all farm activities.",
     *     operationId="api.farm_activity.show",
     *     produces={"application/json", "application/xml"},
     *     tags={"Farm Activities"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         type="integer",
     *         description="Farm Activity Id",
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
    public function show($id, $format = '') {

        $farm_activity = FarmActivity::where('id', $id)->first();

        $this->response['msg'] = Helper::get_response_message("FARM_ACTIVITY_INFO");
        $this->response['msg'] = "Farm Acitivity : {$farm_activity->name} loaded.";
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_ACTIVITY_INFO";
        $this->response['data'] = $farm_activity->toArray();
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
     * @SWG\Post(
     *     path="/farm_activity/create.{format?}",
     *     description="Removefarm activity.",
     *     operationId="api.farm_activity.store",
     *     produces={"application/json", "application/xml"},
     *     tags={"Farm Activities"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Activity Name.",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="code",
     *         in="query",
     *         type="string",
     *         description="Activity Code.",
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
    public function store(FarmActivityRequest $request, $format = '') {

        $farm_activity = new FarmActivity;
        $farm_activity->fill($request->all());
        $farm_activity->save();

        $this->response['msg'] = Helper::get_response_message("FARM_ACTIVITY_CREATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_ACTIVITY_CREATED";
        $this->response['data'] = $farm_activity->toArray();
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
     * @SWG\Put(
     *     path="/farm_activity/{id}/update_farm_acitvity.{format?}",
     *     description="Update Farm activities.",
     *     operationId="api.farm_activity.update",
     *     produces={"application/json", "application/xml"},
     *     tags={"Farm Activities"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         type="integer",
     *         description="Id of activity",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Name of activity",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="code",
     *         in="query",
     *         type="string",
     *         description="Code of activity",
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
    public function update(FarmActivityRequest $request, $id, $format = '') {
        $name = $request->get('name');
        $code = $request->get('code');
		
		$farm_activity = FarmActivity::where('id', $id)->first();

        if(!$farm_activity) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_FARM_ACTIVITY_EDIT");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_FARM_ACTIVITY_EDIT";
            $this->response_code = 401;
            goto callback;
        }

        $farm_activity->name = $name;
        $farm_activity->code = $code;
        $farm_activity->save();

        $this->response['msg'] = Helper::get_response_message("FARM_ACTIVITY_UPDATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_ACTIVITY_UPDATED";
        $this->response['data'] = $farm_activity->toArray();
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
     * @SWG\Delete(
     *     path="/farm_activity/{id}/delete.{format?}",
     *     description="Delete Farm activity.",
     *     operationId="api.farm_activity.destroy",
     *     produces={"application/json", "application/xml"},
     *     tags={"Farm Activities"},
     *     @SWG\Parameter(
     *         name="format?",
     *         in="path",
     *         type="string",
     *         description="Response format.",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         type="integer",
     *         description="Id of activity",
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
    public function destroy($id, $format = '') 
    {
        $farm_activity = FarmActivity::where('id', $id)->first();

        if(!$farm_activity) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_FARM_ACTIVITY_DELETE");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_FARM_ACTIVITY_DELETE";
            $this->response_code = 401;
            goto callback;
        }

        $farm_activity->delete();

        $this->response['msg'] = Helper::get_response_message("FARM_ACTIVITY_DELETED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "FARM_ACTIVITY_DELETED";
        $this->response['data'] = '';

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