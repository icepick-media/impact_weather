<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;
// use JWTAuth;

class ProfileEditFieldRequest  extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->auth;

        $rules = array();

        switch ($this->get('key')) {
            case 'name':
            case 'gender':
                $rules['value'] = "required";
            break;
            case 'contact':
                $rules['value'] = "required|phone:PH";
            break;
            case 'birthdate':
                $rules['value'] = "required|date";
            break;
            case 'username': 
                $rules['value'] = "required|alpha_dash|unique:user,username,".$user->id; 
            break;
            case 'email': 
                $rules['value'] = "required|email|unique:user,email,".$user->id; 
            break;
            default:
                $rules['key'] = "required|in:name,contact,gender,birthdate,username,email";
            break;
        }

        return $rules;
    }

    public function messages() {
        return [];
    }
}
