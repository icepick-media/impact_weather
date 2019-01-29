<?php

namespace App\Laravel\Requests\Api\Auth;

use App\Laravel\Requests\ApiRequestManager;

class LoginRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'contact' => "required",
        ];

        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
