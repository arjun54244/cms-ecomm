<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Men',
            'Women',
            'Kids',
            'T-Shirts',
            'Hoodies',
            'Jeans',
            'Shirts',
            'Jackets',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),

            'description' => fake()->paragraph(),

            'image' => 'categories/default.jpg',

            'banner' => 'categories/banner.jpg',

            'sort_order' => rand(1, 20),

            'is_featured' => rand(0, 1),

            'is_active' => true,

            'meta_title' => $name,

            'meta_description' => fake()->sentence(),

            'meta_keywords' => strtolower($name) . ', clothing, fashion',
        ];
    }
}
