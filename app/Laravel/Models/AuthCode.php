<?php

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class AuthCode extends Model
{

	protected $table = "auth_code";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact', 'code',
    ];

    public $timestamps = false;
}
