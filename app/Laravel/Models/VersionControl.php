<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VersionControl extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "version_control";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'version_name', 'major_version', 'minor_version', 'changelogs'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'major_version' => "int",
        'minor_version' => "int"
    ];
}
