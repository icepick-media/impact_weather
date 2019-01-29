<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class PartnerRequest extends RequestManager
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
            'name' => "required|max:255|unique:partner,name,".$id,
            'sorting' => "required|integer",
            'url' => "sometimes|url",
            'file' => "required|image",
        ];

        if($id) $rules['file'] = "image";

        return $rules;
    }

    public function messages() {
        return [];
    }
}
