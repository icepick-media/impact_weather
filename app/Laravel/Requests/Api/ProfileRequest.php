<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;
// use JWTAuth;

class ProfileRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->user();

        $rules = [
            'name' => "required",
            'email' => "required|email|unique:user,email," . $user->id,
            // 'password' => "required|old_password:" . $user->id,
        ];

        if($this->has('birthdate')) {
            $rules['birthdate'] = "date";
        }

        // if($user->password) {
        //     $rules['password'] = "required|old_password:" . $user->id;
        // }

        return $rules;
    }

    public function messages() {
        return [
            'password.old_password' => "Incorrect password.",
        ];
    }
}
