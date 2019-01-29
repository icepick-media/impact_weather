<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Validation\Rule;

class ResponseMessageRequest extends RequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = $this->route('id')?:0;

        $rules = [
            'content' => "required",
            'code' => "required|unique:response_message,id,".$id,
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
