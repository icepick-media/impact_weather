<?php

namespace App\Laravel\Requests\Api\Auth;

use App\Laravel\Requests\ApiRequestManager;

class RegisterRequest extends ApiRequestManager
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
            // 'email' => "required|email|unique:user,email",
            'contact' => "required|phone:PH|unique:user,contact",
            // 'contact_country' => "required_with:contact"
        ];

        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
