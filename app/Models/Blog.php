<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'published_at',
    ];

    protected $casts = [

        'is_active' => 'boolean',

        'published_at' => 'datetime',

    ];

    /**
     * Automatically generate slug
     */
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($blog) {

    //         if (empty($blog->slug)) {

    //             $blog->slug = Str::slug($blog->title);

    //         }

    //     });
    // }

    /**
     * Scope Active Blogs
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope Published Blogs
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}
