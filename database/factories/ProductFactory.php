<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            'name' => $this->faker->words(3,true),
            'slug'=>Str::slug($this->faker->words(3,true)),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'discount_price' => $this->faker->randomFloat(2, 1, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
            'sold_quantity' => $this->faker->numberBetween(1, 100),
            'brand' => $this ->faker->word(),
            'sku' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(7,19),
            'featured_image' => "https://www.picsum.photos/500?id=".$this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
