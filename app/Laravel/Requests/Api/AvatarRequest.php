<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;
// use JWTAuth;

class AvatarRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->auth;

        $rules = [
            'file' => "required|image",
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
