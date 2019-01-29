<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\RegistrantContact;
use App\Laravel\Requests\Backoffice\RegistrantContactRequest;
use Helper;

class RegistrantContactController extends Controller
{

    protected $data = array();

    public function __construct() {
        $this->data['statuses'] = ['yes' => "Allow Registrant",'no' => "Restrict Registrant"];
        $this->data['allow_stations'] = ['yes' => "Enable weather station",'no' => "Disable weather station"];

    }

    public function index() {
        $this->data['registrants'] = RegistrantContact::orderBy('created_at', "DESC")->get();
        return view('backoffice.registrant.index', $this->data);
    }

    public function create() {
        return view('backoffice.registrant.create', $this->data);
    }

    public function store(RegistrantContactRequest $request) {
        $registrant = new RegistrantContact;
        $registrant->fill($request->all());
        $registrant->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.registrant.index');
    }

    public function edit($id = 0) {
        $registrant = RegistrantContact::find($id);

        if($registrant) {
            $this->data['registrant'] = $registrant;
            return view('backoffice.registrant.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.registrant.index');
    }

    public function update(RegistrantContactRequest $request, $id = 0) {
        $registrant = RegistrantContact::find($id);

        if($registrant) {
            $registrant->fill($request->all());
            $registrant->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record updated.");
            return redirect()->route('backoffice.registrant.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.registrant.index');
    }

    public function destroy($id = 0) {
        $registrant = RegistrantContact::find($id);

        if($registrant) {
            $registrant->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.registrant.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.registrant.index');
    }

    public function trash() {
        $this->data['activitiss'] = RegistrantContact::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.registrant.trash', $this->data);
    }

    public function recover($id = 0) {
        $registrant = RegistrantContact::onlyTrashed()->find($id);

        if($registrant) {
            $registrant->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.registrant.edit', [$registrant->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.registrant.index');
    }

}
