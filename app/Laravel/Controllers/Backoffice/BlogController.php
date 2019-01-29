<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Blog;
use App\Laravel\Models\User;
use App\Laravel\Requests\Backoffice\BlogRequest;
use ImageUploader, Helper;

class BlogController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['users'] = ['' => "Choose an author"] + User::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public function index() {
        $this->data['blogs'] = Blog::orderBy('updated_at', "DESC")->get();
    	return view('backoffice.blog.index', $this->data);
    }

    public function create() {
        return view('backoffice.blog.create', $this->data);
    }

    public function store(BlogRequest $request) {
        $blog = new Blog;
        $blog->fill($request->all());

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/blogs");
            $blog->path = $img['path'];
            $blog->directory = $img['directory'];
            $blog->filename = $img['filename'];
        }

        $blog->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.blog.edit', [$blog->id]);
    }

    public function edit($id = 0) {
        $blog = Blog::find($id);

        if($blog) {
            $this->data['blog'] = $blog;
            return view('backoffice.blog.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.blog.index');
    }

    public function update(BlogRequest $request, $id = 0) {
        $blog = Blog::find($id);

        if($blog) {

            $blog->fill($request->all());

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/blogs");
                $blog->path = $img['path'];
                $blog->directory = $img['directory'];
                $blog->filename = $img['filename'];
            }
            
            $blog->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.blog.edit', [$blog->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.blog.index');
    }

    public function destroy($id = 0) {
        $blog = Blog::find($id);

        if($blog) {
            $blog->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.blog.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.blog.index');
    }

    public function trash() {
        $this->data['blogs'] = Blog::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.blog.trash', $this->data);
    }

    public function recover($id = 0) {
        $blog = Blog::onlyTrashed()->find($id);

        if($blog) {
            $blog->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.blog.edit', [$blog->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.blog.index');
    }

}
