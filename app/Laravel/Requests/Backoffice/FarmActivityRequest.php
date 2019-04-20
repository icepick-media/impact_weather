<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Illuminate\Support\Facades\Auth;

class FarmActivityRequest extends RequestManager
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
            'farm_id' => "required|exists:farm,id",
            'crop_id' => "required|exists:crop,id",
            'activity' => "required|max:255",
            // 'code' => "required",
            // 'code' => "required|unique:station,code,".$id,
            // 'device_type' => "required",
            // 'geo_lat' => "required",
            // 'geo_long' => "required",
        ];

        return $rules;
    }

    public function messages() {
        return [];
    }
}
