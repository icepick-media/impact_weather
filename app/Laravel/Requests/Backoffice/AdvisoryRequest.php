<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class AdvisoryRequest extends RequestManager
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
            'content'   => "required",
        ];

        if($id) $rules['file'] = "image";

        return $rules;
    }

    public function messages() {
        return [];
    }
}
