<?php

namespace App\Laravel\Requests\Api;

use App\Laravel\Requests\ApiRequestManager;

class WishlistRequest extends ApiRequestManager
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'title' => "required",
            'category' => "required",
            // 'address' => "required",
            'state' => "required",
            'city' => "required",
            'street_address' => "required",
            'content' => "required",
            'contact_number' => "required",
            'url' => $this->get('url') ? 'url' : '',
            'file' => "image",
        ];

        if(!$this->get('url_image') OR $this->get('url_image') == "/") {
            $rules['file'] = "required|image";
        }

        return $rules;
    }
}
