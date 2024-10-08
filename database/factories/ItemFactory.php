<?php

namespace Database\Factories;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word,
            'product_price' => $this->faker->randomFloat(2, 100, 1000),
            'product_description' => $this->faker->sentence,
            'product_category' => Category::factory(),
            'product_discount' => $this->faker->numberBetween(0, 50),
            'product_quantity' => $this->faker->numberBetween(1, 100),
            'product_image' => $this->faker->imageUrl(),
        ];
    }
}
