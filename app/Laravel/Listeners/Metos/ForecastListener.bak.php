<?php

namespace App\Laravel\Listeners\Metos;

use App\Laravel\Models\MetosForecast;

use App\Laravel\Events\Metos\Forecast;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon,Helper;

class ForecastListener 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserAction  $event
     * @return void
     */
    public function handle(Forecast $data){
        if(count($data->forecast) > 1){
            foreach($data->forecast as $index => $forecast){
                if($index ==0){ continue; }
                $date = Helper::date_db($forecast['0']);
                $is_exist = MetosForecast::where('station_id',$data->station_id)
                            ->whereRaw("DATE(schedule) = '{$date}'")
                            ->where("hour",(Helper::date_format($forecast['0'],"H")*1))
                            ->first();

                if($is_exist){
                    $new_forecast = $is_exist;
                }else{
                    $new_forecast = new MetosForecast;
                    $new_forecast->station_id = $data->station_id;
                    $new_forecast->schedule = Helper::datetime_db($forecast['0']);
                    $new_forecast->hour  = Helper::date_format($forecast['0'],"H")*1;
                }

                // $fields = ['temperature','feeled_temperature','wind_speed','wind_direction',
                //  'wind_gust', 'low_clouds', 'medium_clouds', 
                //  'high_clouds', 'precipitation', 'probability_of_precip', 
                //  'snow_fraction', 'sea_level_pressure', 'relative_humidity', 
                //  'cape', 'picto_code'];

                $fields = [
                    'temperature','wind_speed','wind_direction','relative_humidity',
                    'picto_code','precipitation','probability_of_precip','radiation','sunshine_time'
                ];

                 foreach($fields as $j => $field){
                    $current_index = $j+1;
                    $new_forecast->{$field} = trim(isset($forecast[$current_index]) ? $forecast[$current_index] : "0");
                 }

                 $new_forecast->save();

                // $new_forecast->temperature = trim()

            }
            
        }
    }
}
