<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Team;
use App\Laravel\Requests\Backoffice\TeamRequest;
use ImageUploader, Helper;

class TeamController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['max_sorting'] = Team::max('sorting') + 1;
    }

    public function index() {
        $this->data['team'] = Team::orderBy('sorting', "ASC")->get();
    	return view('backoffice.team.index', $this->data);
    }

    public function create() {
        return view('backoffice.team.create', $this->data);
    }

    public function store(TeamRequest $request) {
        $team = new Team;
        $team->fill($request->all());

        if($request->hasFile('file')) {
            $img = ImageUploader::upload($request->file('file'), "uploads/images/teams");
            $team->path = $img['path'];
            $team->directory = $img['directory'];
            $team->filename = $img['filename'];
        }

        $team->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.team.edit', [$team->id]);
    }

    public function edit($id = 0) {
        $team = Team::find($id);

        if($team) {
            $this->data['member'] = $team;
            return view('backoffice.team.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.team.index');
    }

    public function update(TeamRequest $request, $id = 0) {
        $team = Team::find($id);

        if($team) {

            $team->fill($request->all());

            if($request->hasFile('file')) {
                $img = ImageUploader::upload($request->file('file'), "uploads/images/teams");
                $team->path = $img['path'];
                $team->directory = $img['directory'];
                $team->filename = $img['filename'];
            }
            
            $team->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.team.edit', [$team->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.team.index');
    }

    public function destroy($id = 0) {
        $team = Team::find($id);

        if($team) {
            $team->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.team.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.team.index');
    }

    public function trash() {
        $this->data['team'] = Team::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.team.trash', $this->data);
    }

    public function recover($id = 0) {
        $team = Team::onlyTrashed()->find($id);

        if($team) {
            $team->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.team.edit', [$team->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.team.index');
    }

}
