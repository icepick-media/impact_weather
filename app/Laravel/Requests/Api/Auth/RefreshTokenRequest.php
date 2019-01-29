<?php

namespace App\Laravel\Requests\Api\Auth;

use App\Laravel\Requests\ApiRequestManager;

class RefreshTokenRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'refresh_token' => "required",
        ];

        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
