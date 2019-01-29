<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;

class FarmMap extends Model
{
    use DateFormatterTrait;

    protected $table = "farm_map";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'farm_id', 'geo_lat', 'geo_long'
    ];

    /**
     * Get the farm associated with this map.
     */
    public function farm() {
        return $this->belongsTo("App\Laravel\Models\Farm", "farm_id", "id");
    }
}
