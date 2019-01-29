<?php

namespace App\Laravel\Requests\Frontend;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class Contactrequest extends RequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = $this->id?:0;

        $rules = [
            'name' => "required",
            'email' => "required|email",
            'contact' => "required",
            'subject' => "required",
            'message' => "required|min:50",
        ];

        return $rules;
    }

    public function messages() {
        return [
            'required' => "Field is required.",
        ];
    }
}
