<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends RequestManager
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
            // 'category_id' => "required|exists:category,id",
            'title' => "required|max:255",
            'slug' => "required|unique:product,slug,".$id,
            'file' => "required|image",
            'sorting' => "required|integer",
        ];

        if($id) $rules['file'] = "image";

        return $rules;
    }

    public function messages() {
        return [];
    }
}
