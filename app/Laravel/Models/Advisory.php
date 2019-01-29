<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advisory extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "advisory";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];

    public function user() {
        return $this->belongsTo("App\Laravel\Models\User", "user_id", "id");
    }

    public function farm() {
        return  $this->hasOne("App\Laravel\Models\Farm", "id", "farm_id")->withTrashed();
    }
}
