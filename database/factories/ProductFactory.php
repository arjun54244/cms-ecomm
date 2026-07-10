<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->randomElement([
            'Oversized Hoodie',
            'Premium Cotton T-Shirt',
            'Slim Fit Jeans',
            'Cargo Pants',
            'Polo T-Shirt',
            'Denim Jacket',
            'Casual Shirt',
            'Winter Sweatshirt',
            'Printed Hoodie',
            'Round Neck Tee',
        ]);

        return [

            'category_id' => Category::inRandomOrder()->first()->id,

            'name' => $name,

            'slug' => Str::slug($name . ' ' . fake()->unique()->numberBetween(1, 9999)),

            'sku' => strtoupper(fake()->bothify('ECM-####')),

            'featured_image' => 'products/default.jpg',

            'short_description' => fake()->sentence(),

            'description' => fake()->paragraphs(4, true),

            'price' => fake()->numberBetween(499, 2999),

            'sale_price' => fake()->numberBetween(399, 2499),

            'cost_price' => fake()->numberBetween(300, 1500),

            'stock' => fake()->numberBetween(5, 100),

            'weight' => fake()->randomFloat(2, 0.20, 1.50),

            'gender' => fake()->randomElement([
                'Men',
                'Women',
                'Kids',
                'Unisex',
            ]),

            'fabric' => fake()->randomElement([
                'Cotton',
                'Linen',
                'Denim',
                'Polyester',
            ]),

            'fit' => fake()->randomElement([
                'Slim',
                'Regular',
                'Oversized',
                'Relaxed',
            ]),

            'care_instruction' => 'Machine wash cold. Do not bleach.',

            'is_featured' => fake()->boolean(40),

            'is_new' => fake()->boolean(60),

            'is_active' => true,

            'meta_title' => $name,

            'meta_description' => fake()->sentence(),

            'meta_keywords' => 'fashion, clothing, ' . $name,
        ];
    }
}
