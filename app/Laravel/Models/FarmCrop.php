<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;

class FarmCrop extends Model
{
    use DateFormatterTrait;

    protected $table = "farm_crop";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'farm_id', 'name', 'variety'
    ];

    /**
     * Get the farm associated with this crop.
     */
    public function farm() {
        return $this->belongsTo("App\Laravel\Models\Farm", "farm_id", "id");
    }

    /**
     * Get the journals associated with this crop.
     */
    public function journals() {
        return $this->hasMany("App\Laravel\Models\Journal", "crop", "name")->where('farm_id', $this->farm_id);
    }
}
