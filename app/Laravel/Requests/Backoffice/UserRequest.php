<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class UserRequest extends RequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'name' => "required",
            'email' => "required|email|unique:user,email",
        ];

        if(!$this->get('password', FALSE)) {
            $rules['fb_id'] = "required";
        } else {
            $rules['password'] = "confirmed";
        }

        if($this->has('birthdate')) {
            $rules['birthdate'] = "date";
        }

        return $rules;
    }

    public function messages() {
        return [
            'password.old_password' => "Incorrect password.",
            'fb_id.required' => "The facebook id field is required when password is not provided.",
        ];
    }
}
