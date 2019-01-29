<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrantContact extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "registrant_contact";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status','contact_number',
        'allow_weather_station'
    ];
}
