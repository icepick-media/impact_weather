<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Advertisement as ImageSlider;
use App\Laravel\Requests\Backoffice\AdvertisementRequest;
use ImageUploader, Helper;

class AdvertisementController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['statuses'] = ['published' => "Published",'unpublish' => "Unpublish"];
    }

    public function index() {
        $this->data['images'] = ImageSlider::orderBy('updated_at', "DESC")->get();
    	return view('backoffice.advertisement.index', $this->data);
    }

    public function create() {
        return view('backoffice.advertisement.create', $this->data);
    }

    public function store(AdvertisementRequest $request) {
        $image = new ImageSlider;
        $image->fill($request->all());

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/ads");
            $image->path = $img['path'];
            $image->directory = $img['directory'];
            $image->filename = $img['filename'];
        }

        $image->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.advertisement.edit', [$image->id]);
    }

    public function edit($id = 0) {
        $image = ImageSlider::find($id);

        if($image) {
            $this->data['image'] = $image;
            return view('backoffice.advertisement.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advertisement.index');
    }

    public function update(AdvertisementRequest $request, $id = 0) {
        $image = ImageSlider::find($id);

        if($image) {
            $image->fill($request->all());

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/ads");
                $image->path = $img['path'];
                $image->directory = $img['directory'];
                $image->filename = $img['filename'];
            }
            
            $image->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.advertisement.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advertisement.index');
    }

    public function destroy($id = 0) {
        $image = ImageSlider::find($id);

        if($image) {
            $image->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.advertisement.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advertisement.index');
    }

    public function trash() {
        $this->data['images'] = ImageSlider::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.advertisement.trash', $this->data);
    }

    public function recover($id = 0) {
        $image = ImageSlider::onlyTrashed()->find($id);

        if($image) {
            $image->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.advertisement.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.advertisement.index');
    }

}
