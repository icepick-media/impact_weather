<?php

namespace App\Laravel\Listeners\Metos;

use App\Laravel\Models\Farm;
use App\Laravel\Models\Station;


use App\Laravel\Events\Metos\Station as StationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon,Helper;

class StationListener 
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
    public function handle(StationEvent $data){
        if(count($data->locations) > 1){
            foreach($data->locations as $index => $location){
                $farm_lat = $location->geo_lat;
                $farm_long = $location->geo_long;
                $farm = Farm::find($location->farm_id);


                $station = Station::whereRaw("(((acos(sin((".$farm_lat."*pi()/180)) * 
                                    sin((`geo_lat`*pi()/180))+cos((".$farm_lat."*pi()/180)) * 
                                    cos((`geo_lat`*pi()/180)) * cos(((".$farm_long."- `geo_long`)* 
                                    pi()/180))))*180/pi())*60*1.1515) BETWEEN '0' AND '15000'")->first();

                $farm->remarks = "No nearby station found.";
                if($station){
                    $farm->station_id = $station->id
                    $farm->remarks = "Nearby station found."
                }

                $farm->save();
            }
            
        }
    }
}