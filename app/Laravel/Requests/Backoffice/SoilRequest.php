<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

class SoilRequest extends RequestManager
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
            'type' => "required",

        ];

        return $rules;
    }

    public function messages() {
        return [
            'required'  => "Field is required."
        ];
    }
}
