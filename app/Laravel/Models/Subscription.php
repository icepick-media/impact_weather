<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "subscription";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'station_id'
    ];

    /**
     * Get the user associated with this subscription.
     */
    public function user() {
        return $this->belongsTo("App\Laravel\Models\User", "user_id", "id");
    }

    /**
     * Get the station associated with this subscription.
     */
    public function station() {
        return $this->belongsTo("App\Laravel\Models\Station", "station_id", "id");
    }

}
