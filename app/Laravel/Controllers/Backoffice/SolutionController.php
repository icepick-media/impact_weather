<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Solution;
use App\Laravel\Requests\Backoffice\SolutionRequest;
use ImageUploader, Helper;

class SolutionController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['max_sorting'] = Solution::max('sorting') + 1;
    }

    public function index() {
        $this->data['solutions'] = Solution::orderBy('sorting', "ASC")->get();
    	return view('backoffice.solution.index', $this->data);
    }

    public function create() {
        return view('backoffice.solution.create', $this->data);
    }

    public function store(SolutionRequest $request) {
        $solution = new Solution;
        $solution->fill($request->all());

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/solutions");
            $solution->path = $img['path'];
            $solution->directory = $img['directory'];
            $solution->filename = $img['filename'];
        }

        $solution->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.solution.edit', [$solution->id]);
    }

    public function edit($id = 0) {
        $solution = Solution::find($id);

        if($solution) {
            $this->data['solution'] = $solution;
            return view('backoffice.solution.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.solution.index');
    }

    public function update(SolutionRequest $request, $id = 0) {
        $solution = Solution::find($id);

        if($solution) {
            $solution->fill($request->all());

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/solutions");
                $solution->path = $img['path'];
                $solution->directory = $img['directory'];
                $solution->filename = $img['filename'];
            }
            
            $solution->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.solution.edit', [$solution->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.solution.index');
    }

    public function destroy($id = 0) {
        $solution = Solution::find($id);

        if($solution) {
            $solution->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.solution.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.solution.index');
    }

    public function trash() {
        $this->data['solutions'] = Solution::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.solution.trash', $this->data);
    }

    public function recover($id = 0) {
        $solution = Solution::onlyTrashed()->find($id);

        if($solution) {
            $solution->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.solution.edit', [$solution->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.solution.index');
    }

}
