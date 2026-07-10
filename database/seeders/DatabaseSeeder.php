<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(SettingSeeder::class);
        // $this->call([
        //     DemoStoreSeeder::class,
        // ]);
        // Testimonial::insert([

        //     [
        //         'name' => 'Rahul Sharma',
        //         'designation' => 'Software Engineer',
        //         'company' => 'Google',
        //         'rating' => 5,
        //         'review' => 'Excellent quality clothing. Fast delivery and premium fabric. Highly recommended.',
        //         'is_featured' => true,
        //         'is_active' => true,
        //         'sort_order' => 1,
        //     ],

        //     [
        //         'name' => 'Priya Verma',
        //         'designation' => 'Fashion Designer',
        //         'company' => 'Zara',
        //         'rating' => 5,
        //         'review' => 'The fitting and fabric quality exceeded my expectations. Will definitely order again.',
        //         'is_featured' => true,
        //         'is_active' => true,
        //         'sort_order' => 2,
        //     ],

        //     [
        //         'name' => 'Aman Gupta',
        //         'designation' => 'Entrepreneur',
        //         'company' => 'Startup Founder',
        //         'rating' => 5,
        //         'review' => 'One of the best online clothing stores. Great customer support and premium packaging.',
        //         'is_featured' => true,
        //         'is_active' => true,
        //         'sort_order' => 3,
        //     ],

        // ]);
    }
}
