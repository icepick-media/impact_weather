<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;

class AdvisoryRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            // 'title' => "required",
            // 'crop' => "required",
            // 'status' => "required",
            'content' => "required",
            'file'    => "required|image",
            // 'start_date' => "required|date",
            // 'end_date' => "required|date",
        ];

        return $rules;
    }

    public function messages() {
        return [
            'required'  => "Field is required.",
            'file.image'    => "Invalid image format."
        ];
    }
}
