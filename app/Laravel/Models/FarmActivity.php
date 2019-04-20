<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmActivity extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "activity";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'farm_id', 'crop_id', 'activity'
    ];

    protected $appends = ['farm_attached','crop_attached'];

    public function getFarmAttachedAttribute() {
        // $expiresAt = now()->addMinutes(10);
        // $cache_session_min = 60;
        $farm = Farm::where('id', $this->farm_id)->first();

        if($farm){ return $farm;}
        return 0;
    }

    public function getCropAttachedAttribute() {
        // $expiresAt = now()->addMinutes(10);
        // $cache_session_min = 60;
        $crop = Crop::where('id', $this->crop_id)->first();

        if($crop){ return $crop;}
        return 0;
    }
}
