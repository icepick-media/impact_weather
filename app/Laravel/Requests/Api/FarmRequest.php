<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;

class FarmRequest extends ApiRequestManager
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
            'map' => "required|array|min:3",
            'crops' => "required|array|min:1",
            'size'  => "required|numeric",
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
