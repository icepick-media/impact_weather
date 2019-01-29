<?php

namespace App\Laravel\Models;

use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes, DateFormatterTrait;

    protected $table = "blog";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug',
        'excerpt', 'content', 'tags'
    ];

    /**
     * Get the author of this blog.
     */
    public function user() {
        return $this->belongsTo("App\Laravel\Models\User", "user_id", "id");
    }

    /**
     * Get the category of this blog.
     */
    public function category() {
        return $this->belongsTo("App\Laravel\Models\BlogCategory", "category_id", "id");
    }

    public function scopeKeyword($query, $keyword) {
        if($keyword)
            return $query->where(function($query) use($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('excerpt', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%");
            });
    } 
}
