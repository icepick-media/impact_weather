<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\ImageAsset;
use App\Laravel\Requests\Backoffice\ImageAssetRequest;
use ImageUploader, Helper;

class ImageAssetController extends Controller
{

	protected $data = array();

    public function __construct() {
        
    }

    public function index() {
        $this->data['images'] = ImageAsset::orderBy('created_at', "DESC")->get();
    	return view('backoffice.image-asset.index', $this->data);
    }

    public function create() {
        return view('backoffice.image-asset.create', $this->data);
    }

    public function store(ImageAssetRequest $request) {
        $image = new ImageAsset;

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/assets");
            $image->path = $img['path'];
            $image->directory = $img['directory'];
            $image->filename = $img['filename'];
        }

        $image->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.image_asset.edit', [$image->id]);
    }

    public function edit($id = 0) {
        $image = ImageAsset::find($id);

        if($image) {
            $this->data['image'] = $image;
            return view('backoffice.image-asset.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_asset.index');
    }

    public function update(ImageAssetRequest $request, $id = 0) {
        $image = ImageAsset::find($id);

        if($image) {

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/assets");
                $image->path = $img['path'];
                $image->directory = $img['directory'];
                $image->filename = $img['filename'];
            }
            
            $image->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.image_asset.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_asset.index');
    }

    public function destroy($id = 0) {
        $image = ImageAsset::find($id);

        if($image) {
            $image->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.image_asset.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_asset.index');
    }

    public function trash() {
        $this->data['images'] = ImageAsset::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.image-asset.trash', $this->data);
    }

    public function recover($id = 0) {
        $image = ImageAsset::onlyTrashed()->find($id);

        if($image) {
            $image->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.image_asset.edit', [$image->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.image_asset.index');
    }

}
