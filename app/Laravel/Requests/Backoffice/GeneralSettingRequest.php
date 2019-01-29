<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class GeneralSettingRequest extends RequestManager
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
            'code' => "required|max:255|unique:general_setting,code,".$id,
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
