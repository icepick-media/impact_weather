<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class ImageAssetRequest extends RequestManager
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
            'file' => "required|image",
        ];

        // if($id) $rules['file'] = "image";

        return $rules;
    }

    public function messages() {
        return [];
    }
}
