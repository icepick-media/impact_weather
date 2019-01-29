<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\GeneralSetting;
use App\Laravel\Requests\Backoffice\GeneralSettingRequest;

class GeneralSettingController extends Controller
{

	protected $data = array();

    public function __construct() {
       
    }

    public function index() {
        $this->data['settings'] = GeneralSetting::orderBy('updated_at', "DESC")->get();
    	return view('backoffice.general-setting.index', $this->data);
    }

    public function create() {
        return view('backoffice.general-setting.create', $this->data);
    }

    public function store(GeneralSettingRequest $request) {
        $setting = new GeneralSetting;
        $setting->fill($request->all());
        $setting->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.general_setting.edit', [$setting->id]);
    }

    public function edit($id = 0) {
        $setting = GeneralSetting::find($id);

        if($setting) {
            $this->data['setting'] = $setting;
            return view('backoffice.general-setting.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.general_setting.index');
    }

    public function update(GeneralSettingRequest $request, $id = 0) {
        $setting = GeneralSetting::find($id);

        if($setting) {
            $setting->fill($request->all());
            $setting->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.general_setting.edit', [$setting->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.general_setting.index');
    }

    public function destroy($id = 0) {
        $setting = GeneralSetting::find($id);

        if($setting) {
            $setting->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.general_setting.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.general_setting.index');
    }

    public function trash() {
        $this->data['settings'] = GeneralSetting::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.general-setting.trash', $this->data);
    }

    public function recover($id = 0) {
        $setting = GeneralSetting::onlyTrashed()->find($id);

        if($setting) {
            $setting->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.general_setting.edit', [$setting->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.general_setting.index');
    }

}
