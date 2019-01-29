<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "product";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'slug',
        'content', 'tags', 'sorting'
    ];

    /**
     * Get the category of this blog.
     */
    public function category() {
        return $this->belongsTo("App\Laravel\Models\BlogCategory", "category_id", "id");
    }
}
