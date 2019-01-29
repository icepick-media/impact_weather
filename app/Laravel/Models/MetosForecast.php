<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Helper, Carbon;

class MetosForecast extends Model
{
    use DateFormatterTrait,SoftDeletes;

    protected $table = "metos_forecast";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id', 'schedule', 'temperature', 
        'feeled_temperature', 'wind_speed', 'wind_direction', 
        'wind_gust', 'low_clouds', 'medium_clouds', 
        'high_clouds', 'precipitation', 'probability_of_precip', 
        'snow_fraction', 'sea_level_pressure', 'relative_humidity', 
        'cape', 'picto_code'
    ];

    protected $appends = ['max_temp','min_temp'];
    // protected $attributes = ['max_temp','min_temp'];

    protected $casts = [
        'temperature' => "int",
        'wind_speed' => "int",
        'precipitation' => "float",
        'probability_of_precip' => "int",
        'relative_humidity' => "int",
    ];

    // public function getMinTempAttribute(){
    //     $station_id = $this->station_id;
    //     $schedule = Helper::date_db($this->schedule);

    //     return (int) self::whereRaw("DATE(schedule) = '{$schedule}'")
    //                 ->where('station_id',$station_id)
    //                 ->min('temperature');
        
    // }

    // public function getMaxTempAttribute(){
    //     // $station_id = $this->station_id;
    //     // $schedule = Helper::date_db($this->schedule);

    //     // return (int) self::whereRaw("DATE(schedule) = '{$schedule}'")
    //     //             ->where('station_id',$station_id)
    //     //             ->max('temperature');
    //     return 0;
    // }


    public function scopeRemember($minutes, $key = null)
    {
        $this->cacheMinutes = $minutes;
        $this->cacheKey = $key;

        return $this;
    }

    public function scopeCurrent_weather($query) {
        $date = Helper::date_db(Carbon::now());
        return $query->whereRaw("DATE(schedule) = '{$date}'")->where("hour",(Helper::date_format(Carbon::now(),"H")*1));
    }

    public function scopeDaily_weather($query) {
        $date = Helper::date_db(Carbon::now());
        return $query->whereRaw("DATE(schedule) = '{$date}'");
        // ->whereIn('hour', [0, 6, 12, 18])
    }

    public function scopeWeekly_weather($query) {
        $start = Helper::date_db(Carbon::now()->addDay());
        $end = Helper::date_db(Carbon::now()->addDays(6));
        return $query->whereRaw("DATE(schedule) >= '{$start}'")
                    ->whereRaw("DATE(schedule) <= '{$end}'");
                    // ->whereIn('hour', [0, 6, 12, 18]);
    }
}
