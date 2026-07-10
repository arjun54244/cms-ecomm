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
        $settings = Cache::rememberForever('website_settings', function () {
            return Setting::query()->first()?->toArray();
        });
        View::share([
            'settings' => (object) $settings,
            'footerPages' => Page::active()->orderBy('sort_order')->get(),
            'testimonials' => Testimonial::active()->orderBy('sort_order')->get()
        ]);
    }
}
