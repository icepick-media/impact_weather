<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\AdvisoryNotification;
use App\Laravel\Models\Farm;
use App\Laravel\Models\User;

use App\Laravel\Requests\Backoffice\AdvisoryRequest;
use ImageUploader, Helper,Input;

class AdvisoryController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['statuses'] = ['published' => "Published",'unpublish' => "Unpublish"];
        $this->data['users'] = ['0' => "Everyone"]+User::where('type','user')->pluck("name","id")->toArray();
    }

    public function index() {
        $this->data['images'] = AdvisoryNotification::orderBy('updated_at', "DESC")->get();
    	return view('backoffice.advisory.index', $this->data);
    }

    public function create() {
        $this->data['farms'] = FALSE;

        if(Input::has('uid')){
            $this->data['farms'] = ['' => "Entire account (General Advisory)"]+Farm::where('user_id',Input::get('uid'))
                                        ->pluck('name','id')->toArray();
        }

        return view('backoffice.advisory.create', $this->data);
    }

    public function store(AdvisoryRequest $request) {
        $image = new AdvisoryNotification;
        $image->fill($request->all());

        if($request->has('farm_id')){
            $image->farm_id = $request->get('farm_id');
        }

        $image->status = $request->get('status');

        $image->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "New advisory added.");

        if($image->user_id != 0){
            if($image->farm_id != 0){
                return redirect()->route('backoffice.user.farm', [$image->user_id,$image->farm_id]);
            }

            return redirect()->route('backoffice.user.edit', [$image->user_id]);
        }
        
        return redirect()->route('backoffice.advisory.edit', [$image->id]);
    }

    public function edit($id = 0) {
        $image = AdvisoryNotification::find($id);

        if($image) {
            $this->data['image'] = $image;

            $this->data['farms'] = FALSE;

            if($image->user_id != 0){
                $this->data['farms'] = ['' => "Entire account (General Advisory)"]+Farm::where('user_id',$image->user_id)
                                            ->pluck('name','id')->toArray();
            }
            return view('backoffice.advisory.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advisory.index');
    }

    public function update(AdvisoryRequest $request, $id = 0) {
        $image = AdvisoryNotification::find($id);

        if($image) {
            $image->fill($request->all());
            if($request->has('farm_id')){
                $image->farm_id = $request->get('farm_id');
            }

            $image->status = $request->get('status');
            
            
            $image->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.advisory.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advisory.index');
    }

    public function destroy($id = 0) {
        $image = AdvisoryNotification::find($id);

        if($image) {
            $image->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.advisory.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advisory.index');
    }

    public function trash() {
        $this->data['images'] = AdvisoryNotification::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.advisory.trash', $this->data);
    }

    public function recover($id = 0) {
        $image = AdvisoryNotification::onlyTrashed()->find($id);

        if($image) {
            $image->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.advisory.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advisory.index');
    }

}
