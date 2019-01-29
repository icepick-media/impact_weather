<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class SolutionRequest extends RequestManager
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
            'slug' => "required|unique:solution,slug,".$id,
            'sorting' => "required|integer",
            'file' => "required|image",
        ];

        if($id) $rules['file'] = "image";

        return $rules;
    }

    public function messages() {
        return [];
    }
}
