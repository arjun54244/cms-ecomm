<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $defaultSettings = [
            'site_name' => 'Jaipur Heritage',
            'site_tagline' => 'Timeless Indian Fashion',
            'logo' => null,
            'favicon' => null,
            'banners' => [],
            'email' => 'support@jaipurheritage.com',
            'phone' => '+91 9876543210',
            'whatsapp' => '+91 9876543210',
            'address' => 'Jaipur, India',
            'google_map_embed' => null,
            'facebook' => '#',
            'instagram' => '#',
            'youtube' => '#',
            'linkedin' => '#',
            'twitter' => '#',
            'footer_description' => 'Premium ethnic wear.',
            'copyright' => '© 2026 Jaipur Heritage. All Rights Reserved.',
            'meta_title' => 'Jaipur Heritage',
            'meta_description' => 'Premium ethnic wear.',
            'meta_keywords' => [],
            'google_analytics' => null,
            'facebook_pixel' => null,
            'enable_cod' => true,
        ];

        try {
            $dbSettings = Cache::rememberForever('website_settings', function () {
                if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                    return Setting::query()->first()?->toArray();
                }
                return null;
            });

            $settings = array_merge($defaultSettings, $dbSettings ?: []);
        } catch (\Throwable $e) {
            $settings = $defaultSettings;
        }

        View::share([
            'settings' => (object) $settings,
            'footerPages' => \Illuminate\Support\Facades\Schema::hasTable('pages') ? Page::active()->orderBy('sort_order')->get() : collect(),
            'testimonials' => \Illuminate\Support\Facades\Schema::hasTable('testimonials') ? Testimonial::active()->orderBy('sort_order')->get() : collect()
        ]);
    }
}
