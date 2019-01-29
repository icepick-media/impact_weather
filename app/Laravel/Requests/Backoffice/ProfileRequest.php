<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends RequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();

        $rules = [
            'name' => "required",
            'email' => "required|email|unique:user,email," . $user->id,
            'password' => "required|old_password:" . $user->id,
        ];

        if($this->has('birthdate')) {
            $rules['birthdate'] = "date";
        }

        return $rules;
    }

    public function messages() {
        return [
            'password.old_password' => "Incorrect password.",
        ];
    }
}
