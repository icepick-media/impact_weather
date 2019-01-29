<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;
// use JWTAuth;

class PasswordRequest extends ApiRequestManager
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
            'new_password' => "required",
            'current_password' => "required|old_password:" . $user->id,
        ];

        return $rules;
    }
}
