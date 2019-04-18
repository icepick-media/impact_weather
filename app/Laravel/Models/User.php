<?php

namespace App\Laravel\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache,DB;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes, DateFormatterTrait;

    protected $table = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'contact',
        'password', 'type', 'gender', 'birthdate',
        'description', 'path', 'directory', 'filename',
        'allow_weather_station'
    ];

    protected $appends = ['default_farm_id','num_farm','station_attached','farm_attached'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function getDefaultFarmIdAttribute(){
        // $expiresAt = now()->addMinutes(10);
        // $cache_session_min = 60;
        $first_farm = Farm::where('user_id',$this->id)->orderBy('created_at','ASC')->first();

        if($first_farm){ return $first_farm->id;}
        return 0;
    }

    public function getNumFarmAttribute(){
        return Farm::where('user_id',$this->id)->count();
    }

    public function getStationAttachedAttribute(){
        $stations = $this->farms()->pluck('station_id')->toArray();

        if(count($stations) > 0){
            return Station::whereIn('id',$stations)->get();
        }
        return FALSE;
    }

    public function getFarmAttachedAttribute(){
        $farms = $this->farms()->get();

        if(count($farms) > 0){
            return $farms;
        }
        return FALSE;
    }

    /**
     * Route notifications for the FCM channel.
     *
     * @return string
     */
    public function routeNotificationForFcm()
    {
        return $this->devices()->where('is_login', '1')->pluck('reg_id')->toArray();
    }

    /**
     * The username field to be searched via passport.
     *
     * @param string $username
     * @return \App\Laravel\Models\User
     */
    public function findForPassport($username) {
        // $col = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username'; 
        // return $this->where($col, $username)->first();
        return $this->where('contact', $username)->first();
    }

    /**
     * Get the devices for this user.
     */
    public function devices() {
        return $this->hasMany("App\Laravel\Models\UserDevice");
    }

    /**
     * Get the facebook account for this user.
     */
    public function facebook() {
        return $this->hasOne("App\Laravel\Models\UserSocial", "user_id")->where('provider', "facebook");
    }

    /**
     * Get the farms for this user.
     */
    public function farms() {
        return $this->hasMany("App\Laravel\Models\Farm", "user_id");
    }

    /**
     * Get the subscriptions for this user.
     */
    public function subscriptions() {
        return $this->hasMany("App\Laravel\Models\Subscription", "user_id");
    }

    /**
     * Search users that match a keyword.
     */
    public function scopeKeyword($query, $keyword) {
        if($keyword){
            return $query->where(function($query) use($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                ->orWhere('username', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%");
            });
        }
    }

}
