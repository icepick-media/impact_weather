<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class TeamRequest extends RequestManager
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
            'file' => "required|image",
            'position' => "required",
        ];

        if($id) $rules['file'] = "image";
        if($this->facebook) $rules['facebook'] = "url";
        if($this->twitter) $rules['twitter'] = "url";
        if($this->linked_in) $rules['linked_in'] = "url";

        return $rules;
    }

    public function messages() {
        return [];
    }
}
