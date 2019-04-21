<?php

namespace App\Laravel\Models;

use App\Laravel\Models\FarmCrop;
use App\Laravel\Models\FarmMap;
use App\Laravel\Models\Station;
use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Helper, Geo,Cache,Str;

class Farm extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "farm";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'station_id', 'remarks','size'
    ];

    protected $appends = ['crop_display', 'farm_display'];

    /**
     * Get the user associated with this farm.
     */
    public function owner() {
        return $this->belongsTo("App\Laravel\Models\User", "user_id", "id");
    }

    public function getCropDisplayAttribute(){
        $crop = FarmCrop::where('farm_id',$this->id)->first();

        if($crop){
            return Str::upper($crop->name." - ".$crop->variety);
        }

        return "n/a";
    }

    public function getFarmDisplayAttribute(){
        $farm = FarmMap::where('farm_id',$this->id)->first();

        if($farm){
            return $farm;
        }
        return false;
    }

    /**
     * Get the station associated with this farm.
     */
    public function station() {
        return  $this->hasOne("App\Laravel\Models\Station", "id", "station_id");
    }

    /**
     * Get the map coordinates associated with this farm.
     */
    public function map() {
        return $this->hasMany("App\Laravel\Models\FarmMap");
    }

    /**
     * Get the crops associated with this farm.
     */
    public function crops() {
        return $this->hasMany("App\Laravel\Models\FarmCrop");
    }

    /**
     * Get the journals associated with this farm.
     */
    public function journals() {
        return $this->hasMany("App\Laravel\Models\Journal");
    }

    public function getMapCenter() {

        $coordinates = [];
        foreach ($this->map as $point) {
            array_push($coordinates, [$point->geo_lat, $point->geo_long]);
        }

        $json = [ 'type' => "Multipoint", 'coordinates' => $coordinates ];
        $centroid = Geo::parseJson(json_encode($json))->getCentroid();

        return ['geo_lat' => $centroid->getX(), 'geo_long' => $centroid->getY()];
    }

    public function updateMap($coordinates) {
        
        $map = array_sort($coordinates, function($value, $index) { 
            return $index; 
        });

        foreach ($map as $coordinates) {
            $farm_map = new FarmMap;
            $farm_map->farm_id = $this->id;
            $location = explode(",", $coordinates, 2);

            if(count($location) == 2) {
                $farm_map->fill([ 
                    'geo_lat' => floatval($location[0]), 
                    'geo_long' => floatval($location[1])
                ]);
            }

            $farm_map->save();
        }

        $map_center = $this->getMapCenter();
        if($closest_station = Station::orderByDistance($map_center['geo_lat'], $map_center['geo_long'])->first()) {
            $this->station_id = $closest_station->id;
            $this->remarks = NULL;
            $this->save();
        }
    }

    public function updateCrops($crops) {
        $crops = array_sort($crops, function($value, $index) { return $index; });
        foreach ($crops as $crop) {

            $info = explode("|", $crop);

            $farm_crop = new FarmCrop;
            $farm_crop->farm_id = $this->id;
            $farm_crop->name = array_shift($info);
            $farm_crop->variety = array_shift($info);
            $farm_crop->save();
        }
    }
}
