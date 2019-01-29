<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class RecommendationRequest extends RequestManager
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
            'content' => "required",
            'type' => "required",
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
