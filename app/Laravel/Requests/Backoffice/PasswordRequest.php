<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class PasswordRequest extends RequestManager
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
            'new_password' => "required|confirmed",
            'current_password' => "required|old_password:" . $user->id,
        ];

        return $rules;
    }
}
