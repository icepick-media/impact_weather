<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class CropRequest extends RequestManager
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
            'name' => "required|max:255",
            'code' => "required",
            'status' => "required",
            'variety' => "required",

        ];

        return $rules;
    }

    public function messages() {
        return [
            'required'  => "Field is required.",
            'variety.required'  => "Put the variety of crops separate with comma (,)"
        ];
    }
}
