<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Station;
use App\Laravel\Requests\Backoffice\StationRequest;
use Helper;

class StationController extends Controller
{

    protected $data = array();

    public function __construct() {
        $this->data['device_types'] = [
            '' => "Choose the type of device", 
            'iMETOS IMT100' => "iMETOS IMT100",
            'iMETOS IMT200' => "iMETOS IMT200",
            'iMETOS IMT280' => "iMETOS IMT280",
            'iMETOS IMT300' => "iMETOS IMT300",
        ];

        $this->data['statuses'] = ['yes' => "Enable Station",'no' => "Deactivate/Hide Station"];
    }

    public function index() {
        $this->data['stations'] = Station::orderBy('created_at', "DESC")->get();
        return view('backoffice.station.index', $this->data);
    }


    public function map() {
        $this->data['stations'] = Station::orderBy('created_at', "DESC")->get();
        return view('backoffice.station.map', $this->data);
    }

    public function create() {
        return view('backoffice.station.create', $this->data);
    }

    public function store(StationRequest $request) {
        $station = new Station;
        $station->fill($request->all());
        $station->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.station.edit', [$station->id]);
    }

    public function edit($id = 0) {
        $station = Station::find($id);

        if($station) {
            $this->data['station'] = $station;
            return view('backoffice.station.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.station.index');
    }

    public function update(StationRequest $request, $id = 0) {
        $station = Station::find($id);

        if($station) {
            $station->fill($request->all());
            $station->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record updated.");
            return redirect()->route('backoffice.station.edit', [$station->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.station.index');
    }

    public function destroy($id = 0) {
        $station = Station::find($id);

        if($station) {
            $station->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.station.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.station.index');
    }

    public function trash() {
        $this->data['stations'] = Station::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.station.trash', $this->data);
    }

    public function recover($id = 0) {
        $station = Station::onlyTrashed()->find($id);

        if($station) {
            $station->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.station.edit', [$station->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.station.index');
    }

}
