<?php

namespace App\Laravel\Controllers\Api;

use App\Laravel\Models\Crop;
use App\Laravel\Transformers\CropTransformer;
use App\Laravel\Transformers\TransformerManager;
use Illuminate\Http\Request;
use Str, Helper;

class CropController extends Controller
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

        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);

        $crops = Crop::orderBy('name', "ASC")->get();

        $this->response['msg'] = Helper::get_response_message("CROP_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "CROP_DATA";
        $this->response['data'] = $this->transformer->transform($crops, new CropTransformer, 'collection');
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
