<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\User;
use App\Laravel\Requests\Backoffice\ProfileRequest;
use App\Laravel\Requests\Backoffice\PasswordRequest;
use Illuminate\Support\Facades\Auth;
use ImageUploader;

class ProfileController extends Controller
{

	protected $data = array();

    public function __construct() {
        $this->data['genders'] = ['' => "---", 'male' => "Male", 'female' => "Female"];
    }

    public function index() {
        $this->data['user'] = Auth::user();
    	return view('backoffice.profile', $this->data);
    }

    public function update_profile(ProfileRequest $request) {
        $user = Auth::user();
        $user->fill($request->except('password'));
        $user->save();
        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Your profile has been updated.");
    	return redirect()->route('backoffice.profile.index');
    }

    public function update_password(PasswordRequest $request) {
    	$user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Your password has been updated");
        return redirect()->route('backoffice.profile.index');
    }

}
