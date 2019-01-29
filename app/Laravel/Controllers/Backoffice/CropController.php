<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Crop;
use App\Laravel\Requests\Backoffice\CropRequest;
use Helper;

class CropController extends Controller
{

    protected $data = array();

    public function __construct() {
        $this->data['statuses'] = ['yes' => "Enable to choose in App",'no' => "Disable in App"];
    }

    public function index() {
        $this->data['crops'] = Crop::orderBy('created_at', "DESC")->get();
        return view('backoffice.crop.index', $this->data);
    }

    public function create() {
        return view('backoffice.crop.create', $this->data);
    }

    public function store(CropRequest $request) {
        $crop = new Crop;
        $crop->fill($request->all());
        $crop->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.crop.index');
    }

    public function edit($id = 0) {
        $crop = Crop::find($id);

        if($crop) {
            $this->data['crop'] = $crop;
            return view('backoffice.crop.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.crop.index');
    }

    public function update(CropRequest $request, $id = 0) {
        $crop = Crop::find($id);

        if($crop) {
            $crop->fill($request->all());
            $crop->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record updated.");
            return redirect()->route('backoffice.crop.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.crop.index');
    }

    public function destroy($id = 0) {
        $crop = Crop::find($id);

        if($crop) {
            $crop->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.crop.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.crop.index');
    }

    public function trash() {
        $this->data['activitiss'] = Crop::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.crop.trash', $this->data);
    }

    public function recover($id = 0) {
        $crop = Crop::onlyTrashed()->find($id);

        if($crop) {
            $crop->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.crop.edit', [$crop->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.crop.index');
    }

}
