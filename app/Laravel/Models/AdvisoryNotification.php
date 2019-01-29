<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvisoryNotification extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "advisory_notifiation";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content','user_id'
        // expired_at
        // status
    ];

    protected $hidden = [
        'expired_at','status','created_at','updated_at','deleted_at'
        // expired_at
        // status
    ];


    public function user() {
        return $this->belongsTo("App\Laravel\Models\User", "user_id", "id");
    }
    public function farm() {
        return  $this->hasOne("App\Laravel\Models\Farm", "id", "farm_id")->withTrashed();
    }
}
