<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Soil extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "soils";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type'
    ];
}