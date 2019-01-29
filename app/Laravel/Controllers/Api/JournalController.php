<?php

namespace App\Laravel\Controllers\Api;

use Carbon\Carbon;
use App\Laravel\Models\Farm;
use App\Laravel\Models\User;
use Illuminate\Http\Request;
use App\Laravel\Models\FarmMap;
use App\Laravel\Models\Journal;
use ImageUploader, Str, Helper;
use App\Laravel\Models\FarmCrop;
use App\Laravel\Requests\Api\JournalRequest;
use App\Laravel\Transformers\JournalTransformer;
use App\Laravel\Transformers\TransformerManager;

class JournalController extends Controller
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

        $user = $request->user();
        $farm = $request->get('farm_data');
        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);

        $journals = $farm->journals()->paginate($per_page);

        $this->response['msg'] = Helper::get_response_message("JOURNAL_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "JOURNAL_DATA";
        $this->response['has_morepages'] = $journals->hasMorePages();
        $this->response['data'] = $this->transformer->transform($journals, new JournalTransformer, 'collection');
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

    public function crop(Request $request, $format = '') {

        $user = $request->user();
        $farm = $request->get('farm_data');
        $per_page = $request->get('per_page', 10);
        $page = $request->get('page', 1);

        $crop = strtolower($request->get('crop'));

        try {
            $date = Carbon::parse($request->get('month_year'));
        } catch (\Exception $e) {
            $date = Carbon::now();
        }

        $journals = $farm->journals()
                        ->where('crop', $crop)
                        ->whereDate('entry_date', '>=', Helper::date_db($date->startOfMonth()))
                        ->whereDate('entry_date', '<=', Helper::date_db($date->endOfMonth()))
                        ->orderBy('entry_date', "ASC")
                        ->orderBy('start_time',"ASC")
                        ->get();

        $this->response['msg'] = Helper::get_response_message("JOURNAL_DATA");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "JOURNAL_DATA";
        $this->response['month_year'] = $date->format("F Y");
        $this->response['data'] = $this->transformer->transform($journals, new JournalTransformer, 'collection');
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

        $journal = $request->get('journal_data');

        $this->response['msg'] = Helper::get_response_message("JOURNAL_INFO");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "JOURNAL_INFO";
        $this->response['data'] = $this->transformer->transform($journal, new JournalTransformer, 'item');
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

    public function store(JournalRequest $request, $format = '') {

        $user = $request->user();
        $farm = $request->get('farm_data');

        if($farm->user_id != $user->id) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_JOURNAL_CREATE");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_JOURNAL_CREATE";
            $this->response_code = 401;
            goto callback;
        }

        // $start_date = Carbon::parse($request->get('start_date'));
        // $end_date = Carbon::parse($request->get('end_date'));

        // $diff = $start_date->diffInDays($end_date, false);

        // if($diff < 0) {
        //     $this->response['msg'] = "Incomplete or invalid input.";
        //     $this->response['status'] = FALSE;
        //     $this->response['status_code'] = "INVALID_INPUT";
        //     $this->response['errors'] = ['end_date' => ['End date must be later than start date.']];
        //     $this->response_code = 421;
        //     goto callback;
        // }

        $this->response['data'] = array();

        $new_journal = new Journal;
        $new_journal->fill($request->only('title','qty','brand','crop'));

        if(!$request->has('qty')){
            $new_journal->qty = "0";
        }
        $new_journal->farm_id = $farm->id;
        $new_journal->entry_date = Helper::date_db($request->get('entry_date'));
        $new_journal->start_time = Helper::date_format($request->get('start_time'),"H:i");
        $new_journal->end_time = Helper::date_format($request->get('end_time'),"H:i");
        $new_journal->save();
        $this->response['data'] = $this->transformer->transform($new_journal, new JournalTransformer, 'item');

        // if($diff == 0) {
        //     $journal = new Journal;
        //     $journal->fill($request->all());
        //     $journal->farm_id = $farm->id;
        //     $journal->entry_date = Helper::date_db($request->get('start_date'));
        //     $journal->save();
        //     array_push(
        //         $this->response['data'], 
        //         $this->transformer->transform($journal, new JournalTransformer, 'item')
        //     );
        // } else {
        //     for ($i=0; $i <= $diff ; $i++) { 
        //         $journal = new Journal;
        //         $journal->fill($request->all());
        //         $journal->farm_id = $farm->id;
        //         $journal->entry_date = Helper::date_db(Carbon::parse($start_date)->addDays($i));
        //         $journal->save();
        //         array_push(
        //             $this->response['data'], 
        //             $this->transformer->transform($journal, new JournalTransformer, 'item')
        //         );
        //     }
        // }

        $this->response['msg'] = Helper::get_response_message("JOURNAL_CREATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "JOURNAL_CREATED";
        
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

    public function update(JournalRequest $request, $format = '') {

        $user = $request->user();
        $journal = $request->get('journal_data');
        $farm = Farm::findOrNew($journal->farm_id);

        if($farm->user_id != $user->id) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_JOURNAL_EDIT");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_JOURNAL_EDIT";
            $this->response_code = 401;
            goto callback;
        }

        $journal->fill($request->only('title','qty','brand','crop'));

        if(!$request->has('qty')){
            $journal->qty = "0";
        }
        $journal->entry_date = Helper::date_db($request->get('entry_date'));
        $journal->start_time = Helper::date_format($request->get('start_time'),"H:i");
        $journal->end_time = Helper::date_format($request->get('end_time'),"H:i");
        $journal->save();

        $this->response['msg'] = Helper::get_response_message("JOURNAL_UPDATED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "JOURNAL_UPDATED";
        $this->response['data'] = $this->transformer->transform($journal, new JournalTransformer, 'item');
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

    public function destroy(Request $request, $format = '') {

        $user = $request->user();
        $journal = $request->get('journal_data');
        $farm_owner_id = $journal->farm ? $journal->farm->user_id : 0;

        if($farm_owner_id != $user->id) {
            $this->response['msg'] = Helper::get_response_message("UNAUTHORIZED_JOURNAL_DELETE");
            $this->response['status'] = FALSE;
            $this->response['status_code'] = "UNAUTHORIZED_JOURNAL_DELETE";
            $this->response_code = 401;
            goto callback;
        }

        $journal->delete();

        $this->response['msg'] = Helper::get_response_message("JOURNAL_DELETED");
        $this->response['status'] = TRUE;
        $this->response['status_code'] = "JOURNAL_DELETED";
        $this->response['data'] = $this->transformer->transform($journal, new JournalTransformer, 'item');

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
