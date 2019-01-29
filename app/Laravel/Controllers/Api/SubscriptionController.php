<?php 

namespace App\Laravel\Controllers\Api;

use App\Laravel\Models\Subscription;
use App\Laravel\Requests\Api\SubscriptionRequest;
use App\Laravel\Transformers\SubscriptionTransformer;
use App\Laravel\Transformers\TransformerManager;
use Helper, Str;
use Illuminate\Http\Request;

class SubscriptionController extends Controller{

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

        $subscriptions = $user->subscriptions()->orderBy('created_at', "DESC")->paginate($per_page);

        $this->response['msg'] = Helper::get_response_message("SUBSCRIPTION_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "SUBSCRIPTION_DATA";
        $this->response['has_morepages'] = $subscriptions->hasMorePages();
        $this->response['data'] = $this->transformer->transform($subscriptions, new SubscriptionTransformer, 'collection');
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

    public function subscribe(SubscriptionRequest $request, $format = '') {

        $user = $request->user();
        $station = $request->get('station_data');

        $existing_subscription = Subscription::where('user_id', $user->id)->where('station_id', $station->id)->first();
        
        if($existing_subscription) {
            $this->response['msg'] = Helper::get_response_message("SUBSCRIPTION_ALREADY_EXIST");
            $this->response['status_code'] = "SUBSCRIPTION_ALREADY_EXIST";
            $this->response_code = 409;
            goto callback;
        }

        $subscription = new Subscription;
        $subscription->fill($request->all());
        $subscription->user_id = $user->id;
        $subscription->type = "free";
        $subscription->status = "active";
        $subscription->save();

        $this->response['msg'] = Helper::get_response_message("SUBSCRIPTION_CREATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "SUBSCRIPTION_CREATED";
        $this->response['data'] = $this->transformer->transform($subscription, new SubscriptionTransformer, 'item');
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

    public function unsubscribe(SubscriptionRequest $request, $format = '') {

        $user = $request->user();
        $subscription = $request->get('subscription_data');

        $subscription->delete();

        $this->response['msg'] = Helper::get_response_message("SUBSCRIPTION_DELETED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "SUBSCRIPTION_DELETED";
        $this->response['data'] = $this->transformer->transform($subscription, new SubscriptionTransformer, 'item');
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