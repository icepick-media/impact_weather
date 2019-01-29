<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\FarmActivity;
use App\Laravel\Requests\Backoffice\FarmActivityRequest;
use Helper;

class FarmActivityController extends Controller
{

    protected $data = array();

    public function __construct() {
        $this->data['statuses'] = ['yes' => "Enable Activity",'no' => "Deactivate/Hide Activity"];
    }

    public function index() {
        $this->data['activities'] = FarmActivity::orderBy('created_at', "DESC")->get();
        return view('backoffice.activity.index', $this->data);
    }

    public function create() {
        return view('backoffice.activity.create', $this->data);
    }

    public function store(FarmActivityRequest $request) {
        $activity = new FarmActivity;
        $activity->fill($request->all());
        $activity->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.activity.edit', [$activity->id]);
    }

    public function edit($id = 0) {
        $activity = FarmActivity::find($id);

        if($activity) {
            $this->data['activity'] = $activity;
            return view('backoffice.activity.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.activity.index');
    }

    public function update(FarmActivityRequest $request, $id = 0) {
        $activity = FarmActivity::find($id);

        if($activity) {
            $activity->fill($request->all());
            $activity->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record updated.");
            return redirect()->route('backoffice.activity.edit', [$activity->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.activity.index');
    }

    public function destroy($id = 0) {
        $activity = FarmActivity::find($id);

        if($activity) {
            $activity->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.activity.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.activity.index');
    }

    public function trash() {
        $this->data['activitiss'] = FarmActivity::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.activity.trash', $this->data);
    }

    public function recover($id = 0) {
        $activity = FarmActivity::onlyTrashed()->find($id);

        if($activity) {
            $activity->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.activity.edit', [$activity->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.activity.index');
    }

}
