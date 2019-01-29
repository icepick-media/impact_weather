<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "journal";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'farm_id', 'crop', 'title',
        'entry_date', 'status','qty','brand'
    ];

    /**
     * Get the farm associated with this journal.
     */
    public function farm() {
        return $this->belongsTo("App\Laravel\Models\Farm", "farm_id", "id");
    }
}
