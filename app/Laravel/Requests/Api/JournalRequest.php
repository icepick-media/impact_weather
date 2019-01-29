<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;

class JournalRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'title' => "required",
            'crop' => "required",
            // 'status' => "required",
            'entry_date' => "required|date",
            'start_time'    => "required",
            'end_time'    => "required",
            'qty'   => "nullable|numeric",
            // 'start_date' => "required|date",
            // 'end_date' => "required|date",
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
