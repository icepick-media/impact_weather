<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Input, Helper, DB,Carbon;

use App\Laravel\Models\MetosForecast;

class Station extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "station";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'geo_lat', 'geo_long', 
        'country', 'state', 'city', 'street_address','status',
        'public_key', 'private_key',
    ];

    public $appends = [
        'distance', 'is_nearby','num_farm','last_date','farm_attached'
    ];  

    public function metos(){
        return $this->hasMany("App\Laravel\Models\MetosForecast",'station_id','code');
    }

    public function farm(){
        return $this->hasMany("App\Laravel\Models\Farm",'station_id','id')->orderBy('created_at','DESC');
    }

    public function getNumFarmAttribute(){
        return Farm::where('station_id',$this->id)->count();
    }

    public function getFarmAttachedAttribute(){
        $farms = $this->farm()->get()->toArray();

        if(count($farms) > 0){
            return $farms;
        }
        return FALSE;
    }

    public function getLastDateAttribute(){
        $last = MetosForecast::where('station_id',$this->code)->orderBy('schedule','DESC')->first();
        return $last?$last->schedule:FALSE;
    }

    /**
     * Get the distance
     *
     * @var array
     */
    public function getDistanceAttribute() {
        $lat = Input::get('user_lat');
        $long = Input::get('user_long');
        $distance = NULL;
        if($lat and $long)
            $distance =  ( 6371 * acos( cos( deg2rad($lat) ) * cos( deg2rad( $this->geo_lat ) ) * 
            cos( deg2rad( $this->geo_long ) - deg2rad($long) ) + sin( deg2rad($lat) ) * sin( deg2rad( $this->geo_lat ) ) ) );
        return $distance;
    }

    /**
     * Check this station if nearby
     *
     * @var array
     */
    public function getIsNearbyAttribute() {
        return $this->distance !== NULL ? $this->distance <= 15 : false;
    }

    /**
     * Get nearby stations
     *
     * @var array
     */
    public function scopeNearby($query, $lat, $long, $radius = 15) {

        $distance_formula = "( 6371 * acos( cos( radians(?) ) * cos( radians( geo_lat ) ) * 
        cos( radians( geo_long ) - radians(?) ) + sin( radians(?) ) * sin( radians( geo_lat ) ) ) )"; 
        // replace 6371 by 3959 if searching by miles instead of km

        return $query->select(DB::raw("*, {$distance_formula} AS computed_distance"))
                ->having('computed_distance', '<', $radius)
                ->orderBy('computed_distance', "DESC")
                ->setBindings([$lat, $long, $lat], 'select');
    }

    public function scopeOrderByDistance($query, $lat, $long) {

        $distance_formula = "( 6371 * acos( cos( radians(?) ) * cos( radians( geo_lat ) ) * 
        cos( radians( geo_long ) - radians(?) ) + sin( radians(?) ) * sin( radians( geo_lat ) ) ) )"; 
        // replace 6371 by 3959 if searching by miles instead of km

        return $query->select(DB::raw("*, {$distance_formula} AS computed_distance"))
                ->orderBy('computed_distance', "DESC")
                ->setBindings([$lat, $long, $lat], 'select');
    }

    public function scopeActive($query){
        return $query->where('status','yes');
    }

}
