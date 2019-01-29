<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recommendation extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "recommendation";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'type', 'status', 'criteria',
        'temp_min', 'temp_max', 'humidity_min', 'humidity_max', 
        'wind_speed_min', 'wind_speed_max', 'prob_of_precip_min', 
        'prob_of_precip_max', 'precipitation_min', 'precipitation_max'
    ];

    /**
     * Get all recommendations that pass the criteria
     *
     * @var array
     */
    public function scopeCriteria($query, MetosForecast $forecast) {
        return $query
                ->where('temp_min', '<=', $forecast->temperature)->where('temp_max', '>=', $forecast->temperature)
                ->where('humidity_min', '<=', $forecast->relative_humidity)->where('humidity_max', '>=', $forecast->relative_humidity)
                ->where('wind_speed_min', '<=', $forecast->wind_speed)->where('wind_speed_max', '>=', $forecast->wind_speed)
                ->where('prob_of_precip_min', '<=', $forecast->probability_of_precip)->where('prob_of_precip_max', '>=', $forecast->probability_of_precip)
                ->where('precipitation_min', '<=', $forecast->precipitation)->where('precipitation_max', '>=', $forecast->precipitation);
    }

}
