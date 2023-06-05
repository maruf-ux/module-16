<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $title = fake()->title();
        $slug = Str::slug($title, '-');

        return [
            'name'=> $title,
            'price'=> fake()->randomElement([10000, 20000, 50000]),
            'quantity'=> fake()->randomElement([3, 2, 1, 4, 4]),
            'category'=> fake()->word(),
            'description'=> fake()->sentence(),
            // 'slug'=> $slug,
        ];
    }
}
