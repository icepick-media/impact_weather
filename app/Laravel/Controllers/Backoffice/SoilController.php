<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Soil;
use App\Laravel\Requests\Backoffice\SoilRequest;

class SoilController extends Controller
{

    protected $data = array();

    public function __construct() {
        $this->data['statuses'] = ['yes' => "Enable to choose in App",'no' => "Disable in App"];
    }

    public function index() {
        $this->data['soils'] = Soil::orderBy('created_at', "DESC")->get();
        return view('backoffice.soil.index', $this->data);
    }

    public function create() {
        return view('backoffice.soil.create', $this->data);
    }

    public function store(SoilRequest $request) {
        $soil = new Soil;
        $soil->fill($request->all());
        $soil->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.soil.index');
    }

    public function edit($id = 0) {
        $soil = Soil::find($id);

        if($soil) {
            $this->data['soil'] = $soil;
            return view('backoffice.soil.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.soil.index');
    }

    public function update(SoilRequest $request, $id = 0) {
        $soil = Soil::find($id);

        if($soil) {
            $soil->fill($request->all());
            $soil->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record updated.");
            return redirect()->route('backoffice.soil.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.soil.index');
    }

    public function destroy($id = 0) {
        $soil = Soil::find($id);

        if($soil) {
            $soil->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.soil.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.soil.index');
    }

    public function trash() {
        $this->data['soils'] = Soil::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.soil.trash', $this->data);
    }

    public function recover($id = 0) {
        $soil = Soil::onlyTrashed()->find($id);

        if($soil) {
            $soil->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.soil.edit', [$soil->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.soil.index');
    }

}
