<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Product;
use App\Laravel\Requests\Backoffice\ProductRequest;
use ImageUploader, Helper;

class ProductController extends Controller
{

    protected $data = array();

    public function __construct() {
        $this->data['max_sorting'] = Product::max('sorting') + 1;
    }

    public function index() {
        $this->data['products'] = Product::orderBy('sorting', "ASC")->get();
        return view('backoffice.product.index', $this->data);
    }

    public function create() {
        return view('backoffice.product.create', $this->data);
    }

    public function store(ProductRequest $request) {
        $product = new Product;
        $product->fill($request->all());

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/products");
            $product->path = $img['path'];
            $product->directory = $img['directory'];
            $product->filename = $img['filename'];
        }

        if($request->hasFile('icon_file')) {
            $img = ImageUploader::upload($request->file('icon_file'), "uploads/images/products/icons");
            $product->icon_path = $img['path'];
            $product->icon_directory = $img['directory'];
            $product->icon_filename = $img['filename'];
        }

        $product->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.product.edit', [$product->id]);
    }

    public function edit($id = 0) {
        $product = Product::find($id);

        if($product) {
            $this->data['product'] = $product;
            return view('backoffice.product.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.product.index');
    }

    public function update(ProductRequest $request, $id = 0) {
        $product = Product::find($id);

        if($product) {
            $product->fill($request->all());

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/products");
                $product->path = $img['path'];
                $product->directory = $img['directory'];
                $product->filename = $img['filename'];
            }

            if($request->hasFile('icon_file')) {
                $img = ImageUploader::upload($request->file('icon_file'), "uploads/images/products/icons");
                $product->icon_path = $img['path'];
                $product->icon_directory = $img['directory'];
                $product->icon_filename = $img['filename'];
            }
            
            $product->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.product.edit', [$product->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.product.index');
    }

    public function destroy($id = 0) {
        $product = Product::find($id);

        if($product) {
            $product->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.product.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.product.index');
    }

    public function trash() {
        $this->data['products'] = Product::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.product.trash', $this->data);
    }

    public function recover($id = 0) {
        $product = Product::onlyTrashed()->find($id);

        if($product) {
            $product->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.product.edit', [$product->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.product.index');
    }

}
