<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Partner;
use App\Laravel\Requests\Backoffice\PartnerRequest;
use ImageUploader, Helper;

class PartnerController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['max_sorting'] = Partner::max('sorting') + 1;
    }

    public function index() {
        $this->data['partners'] = Partner::orderBy('sorting', "ASC")->get();
    	return view('backoffice.partner.index', $this->data);
    }

    public function create() {
        return view('backoffice.partner.create', $this->data);
    }

    public function store(PartnerRequest $request) {
        $partner = new Partner;
        $partner->fill($request->all());

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/partners");
            $partner->path = $img['path'];
            $partner->directory = $img['directory'];
            $partner->filename = $img['filename'];
        }
        
        $partner->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.partner.edit', [$partner->id]);
    }

    public function edit($id = 0) {
        $partner = Partner::find($id);

        if($partner) {
            $this->data['partner'] = $partner;
            return view('backoffice.partner.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.partner.index');
    }

    public function update(PartnerRequest $request, $id = 0) {
        $partner = Partner::find($id);

        if($partner) {
            $partner->fill($request->all());

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/partners");
                $partner->path = $img['path'];
                $partner->directory = $img['directory'];
                $partner->filename = $img['filename'];
            }
            
            $partner->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.partner.edit', [$partner->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.partner.index');
    }

    public function destroy($id = 0) {
        $partner = Partner::find($id);

        if($partner) {
            $partner->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.partner.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.partner.index');
    }

    public function trash() {
        $this->data['partners'] = Partner::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.partner.trash', $this->data);
    }

    public function recover($id = 0) {
        $partner = Partner::onlyTrashed()->find($id);

        if($partner) {
            $partner->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.partner.edit', [$partner->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.partner.index');
    }

}
