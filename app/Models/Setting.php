<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'site_name',
        'site_tagline',

        'logo',
        'favicon',
        'banners',

        'email',
        'phone',
        'whatsapp',
        'address',
        'google_map_embed',

        'facebook',
        'instagram',
        'youtube',
        'linkedin',
        'twitter',

        'footer_description',
        'copyright',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'google_analytics',
        'facebook_pixel',
        'enable_cod',
    ];

    protected $casts = [
        'banners' => 'array',
        'meta_keywords' => 'array',
        'enable_cod' => 'boolean',
    ];  

    protected static ?Setting $settings = null;

    protected static function booted()
    {
        static::saved(function ($setting) {
            \Illuminate\Support\Facades\Cache::forget('website_settings');
        });
    }

    public static function getSettings(): ?self
    {
        if (static::$settings === null) {
            static::$settings = static::first();
        }

        return static::$settings;
    }
}
