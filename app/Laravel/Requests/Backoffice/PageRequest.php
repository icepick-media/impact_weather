<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class PageRequest extends RequestManager
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
            'title' => "required|max:255",
            'code' => "required|unique:page,code,".$id,
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
