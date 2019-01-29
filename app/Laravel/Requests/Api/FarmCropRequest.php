<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;

class FarmCropRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'crops' => "required|array|min:1",
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
