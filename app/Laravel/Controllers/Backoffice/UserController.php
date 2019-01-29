<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\User;
use App\Laravel\Models\AdvisoryNotification;
use App\Laravel\Models\Journal;
use App\Laravel\Models\Farm;
use App\Laravel\Models\Station;

use App\Laravel\Requests\Backoffice\UserPasswordRequest;
use App\Laravel\Requests\Backoffice\UserProfileRequest;
use App\Laravel\Requests\Backoffice\UserRequest;
use App\Laravel\Requests\Backoffice\UserFarmRequest;

use ImageUploader, Helper,DB;

class UserController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['genders'] = ['' => "---", 'male' => "Male", 'female' => "Female"];
        $this->data['allow_stations'] = ['yes' => "Enable weather station",'no' => "Disable weather station"];
    }

    public function index() {
        $this->data['users'] = User::where('type', "user")->orderBy('created_at', "DESC")->get();
    	return view('backoffice.user.index', $this->data);
    }

    public function create() {
        return view('backoffice.user.create', $this->data);
    }

    public function store(UserRequest $request) {
        $user = new User;
        $user->fill($request->all());
        $user->username = Helper::create_username($user->name);

        if($request->get('fb_id', FALSE)) {
            $user->fb_id = $request->get('fb_id');
        } else {
             $user->password = bcrypt($request->get('password'));
        }

        if($request->hasFile('file')) {
            $image = ImageUploader::upload($request->file('file'), "uploads/images/avatars");
            $user->path = $image['path'];
            $user->directory = $image['directory'];
            $user->filename = $image['filename'];
        }

        $user->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.user.edit', [$user->id]);
    }

    public function farm($id = 0,$farm_id = 0){
        $farm = Farm::where('user_id',$id)->find($farm_id);

        if($farm){
            $this->data['farm'] = $farm;
            $this->data['advisories'] = AdvisoryNotification::where(function($query) use($farm){
                            return $query->where('user_id',0)
                                  ->orWhere('user_id',$farm->user_id);
                        })
                        ->where(function($query) use($farm){
                            return $query->where('farm_id',0)
                                  ->orWhere('farm_id',$farm->id);
                        })
                        ->orderBy('updated_at', "DESC")->get();
            $this->data['activities'] = Journal::where('farm_id',$farm->id)->orderBy('created_at',"DESC")->get();
            $this->data['user'] = User::find($id);
            return view('backoffice.user.farm.index', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Invalid farm reference.");
        return redirect()->route('backoffice.user.index');
    }

    public function edit_farm($id = 0,$farm_id = 0){
        $farm = Farm::where('user_id',$id)->find($farm_id);

        if($farm){
            $this->data['farm'] = $farm;
            $this->data['stations'] = Station::pluck("id",DB::raw("CONCAT(code,' - ',name ) AS code"));
            // $this->data['activities'] = Journal::where('farm_id',$farm->id)->orderBy('created_at',"DESC")->get();
            $this->data['user'] = User::find($id);
            return view('backoffice.user.farm.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Invalid farm reference.");
        return redirect()->route('backoffice.user.index');
    }

    public function update_farm(UserFarmRequest $request,$id = 0, $farm_id = 0){
       $farm = Farm::where('user_id',$id)->find($farm_id);
       $old_station = $farm->station_id;
       if($farm){
           if($old_station != $request->get('station_id')){
                $farm->station_id = $request->get('station_id');
                $farm->save();
           }
           // $this->data['farm'] = $farm;
           // $this->data['stations'] = Station::pluck("id",DB::raw("CONCAT(code,' - ',name ) AS code"));
           // $this->data['activities'] = Journal::where('farm_id',$farm->id)->orderBy('created_at',"DESC")->get();
           // $this->data['user'] = User::find($id);
           // return view('backoffice.user.farm.edit', $this->data);
           
           session()->flash('notification-status',"success");
           session()->flash('notification-msg', "New station attached.");
           // return view('backoffice.user.farm.edit', $this->data);
           return redirect()->route('backoffice.user.farm',[$farm->user_id,$farm->id]);

       }

       session()->flash('notification-status',"error");
       session()->flash('notification-msg', "Invalid farm reference.");
       return redirect()->route('backoffice.user.index'); 
    }

    public function edit($id = 0) {
        $user = User::where('type', "user")->find($id);

        if($user) {
            $this->data['user'] = $user;
            $farms = $user->farms()->pluck('id')->toArray();

            if(!$farms){ $farms = ["0"];}
            $this->data['last_activty'] = Journal::whereIn('farm_id',$farms)->orderBy('created_at','DESC')->take(5)->get();
            return view('backoffice.user.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.user.index');
    }

    public function update_profile(UserProfileRequest $request, $id = 0) {
        $user = User::where('type', "user")->find($id);

        if($user) {
            $user->fill($request->except('password'));
            
            if($request->get('fb_id', FALSE)) {
                $user->fb_id = $request->get('fb_id');
            }

            if($request->hasFile('file')) {
                $image = ImageUploader::upload($request->file('file'), "uploads/images/avatars");
                $user->path = $image['path'];
                $user->directory = $image['directory'];
                $user->filename = $image['filename'];
            }
            
            $user->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "User profile has been updated.");
            return redirect()->route('backoffice.user.edit', [$user->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.user.index');
    }

    public function update_password(UserPasswordRequest $request, $id = 0) {
    	$user = User::where('type', "user")->find($id);

        if($user) {
            $user->password = bcrypt($request->get('new_password'));
            $user->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "User password has been updated");
            return redirect()->route('backoffice.user.edit', [$user->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.user.index');
    }

    public function destroy($id = 0) {
        $user = User::where('type', "user")->find($id);

        if($user) {
            $user->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.user.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.user.index');
    }

    public function trash() {
        $this->data['users'] = User::onlyTrashed()->where('type', "user")->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.user.trash', $this->data);
    }

    public function recover($id = 0) {
        $user = User::onlyTrashed()->where('type', "user")->find($id);

        if($user) {
            $user->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.user.edit', [$user->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.user.index');
    }

}
