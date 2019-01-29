<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class BlogRequest extends RequestManager
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
            'user_id' => "required|exists:user,id",
            // 'category_id' => "required|exists:category,id",
            'title' => "required|max:255",
            'slug' => "required|unique:blog,slug,".$id,
            'file' => "image",
        ];

        // if($id) $rules['file'] = "image";

        return $rules;
    }

    public function messages() {
        return [];
    }
}
