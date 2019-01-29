<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class RegistrantContactRequest extends RequestManager
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
            'name' => "required|max:255",
            'contact_number' => "required",
            'status' => "required",
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
