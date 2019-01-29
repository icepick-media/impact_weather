<?php

namespace App\Laravel\Controllers\Api;

use App\Laravel\Transformers\FarmCropTransformer;
use App\Laravel\Transformers\TransformerManager;
use Illuminate\Http\Request;
use ImageUploader, Str, Helper;

class FarmCropController extends Controller
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

    public function show(Request $request, $format = '') {

        $farm = $request->get('farm_data');

        $this->response['msg'] = Helper::get_response_message("FARM_CROP_NOT_FOUND");
        $this->response['status_code'] = "FARM_CROP_NOT_FOUND";
        $this->response_code = 404;
       
        if($farm_crop = $farm->crops()->where('name', $request->get('crop'))->first()) {
            $this->response['msg'] = Helper::get_response_message("FARM_CROP_INFO");
            $this->response['status'] = TRUE;
            $this->response['status_code'] = "FARM_CROP_INFO";
            $this->response['data'] = $this->transformer->transform($farm_crop, new FarmCropTransformer, 'item');
            $this->response_code = 200;
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

    
}
