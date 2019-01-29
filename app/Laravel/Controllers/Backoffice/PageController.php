<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Page;
use App\Laravel\Requests\Backoffice\PageRequest;
use ImageUploader, Helper;

class PageController extends Controller
{

	protected $data = array();

    public function __construct() {

    }

    public function index() {
        $this->data['pages'] = Page::orderBy('updated_at', "DESC")->get();
    	return view('backoffice.page.index', $this->data);
    }

    public function create() {
        return view('backoffice.page.create', $this->data);
    }

    public function store(PageRequest $request) {
        $page = new Page;
        $page->fill($request->all());
        $page->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.page.edit', [$page->id]);
    }

    public function edit($id = 0) {
        $page = Page::find($id);

        if($page) {
            $this->data['page'] = $page;
            return view('backoffice.page.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.page.index');
    }

    public function update(PageRequest $request, $id = 0) {
        $page = Page::find($id);

        if($page) {

            $page->fill($request->all());
            $page->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.page.edit', [$page->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.page.index');
    }

    public function destroy($id = 0) {
        $page = Page::find($id);

        if($page) {
            $page->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.page.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.page.index');
    }

    public function trash() {
        $this->data['pages'] = Page::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.page.trash', $this->data);
    }

    public function recover($id = 0) {
        $page = Page::onlyTrashed()->find($id);

        if($page) {
            $page->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.page.edit', [$page->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.page.index');
    }

}
