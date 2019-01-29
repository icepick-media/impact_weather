<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\ImageSlider;
use App\Laravel\Requests\Backoffice\ImageSliderRequest;
use ImageUploader, Helper;

class ImageSliderController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['max_sorting'] = ImageSlider::max('sorting') + 1;
    }

    public function index() {
        $this->data['images'] = ImageSlider::orderBy('sorting', "ASC")->get();
    	return view('backoffice.image-slider.index', $this->data);
    }

    public function create() {
        return view('backoffice.image-slider.create', $this->data);
    }

    public function store(ImageSliderRequest $request) {
        $image = new ImageSlider;
        $image->fill($request->all());

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/sliders");
            $image->path = $img['path'];
            $image->directory = $img['directory'];
            $image->filename = $img['filename'];
        }

        $image->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.image_slider.edit', [$image->id]);
    }

    public function edit($id = 0) {
        $image = ImageSlider::find($id);

        if($image) {
            $this->data['image'] = $image;
            return view('backoffice.image-slider.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_slider.index');
    }

    public function update(ImageSliderRequest $request, $id = 0) {
        $image = ImageSlider::find($id);

        if($image) {
            $image->fill($request->all());

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/sliders");
                $image->path = $img['path'];
                $image->directory = $img['directory'];
                $image->filename = $img['filename'];
            }
            
            $image->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.image_slider.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_slider.index');
    }

    public function destroy($id = 0) {
        $image = ImageSlider::find($id);

        if($image) {
            $image->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.image_slider.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_slider.index');
    }

    public function trash() {
        $this->data['images'] = ImageSlider::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.image-slider.trash', $this->data);
    }

    public function recover($id = 0) {
        $image = ImageSlider::onlyTrashed()->find($id);

        if($image) {
            $image->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.image_slider.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_slider.index');
    }

}
