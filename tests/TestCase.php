<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        \Illuminate\Support\Facades\Cache::forget('website_settings');

        if (\Illuminate\Support\Facades\Schema::hasTable('settings') && \App\Models\Setting::count() === 0) {
            \App\Models\Setting::create([
                'site_name' => 'Jaipur Heritage',
                'meta_title' => 'Jaipur Heritage',
                'meta_description' => 'Jaipur Heritage description',
                'banners' => [],
                'enable_cod' => true,
            ]);
        }

        $settings = \App\Models\Setting::first();
        if ($settings) {
            \Illuminate\Support\Facades\View::share('settings', (object) $settings->toArray());
        }
    }
}
