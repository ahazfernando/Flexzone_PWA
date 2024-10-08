<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cus_name' => $this->faker->name,
            'cus_email' => $this->faker->email,
            'cus_phone' => $this->faker->phoneNumber,
            'cus_address' => $this->faker->address,
            'pro_name' => $this->faker->word,
            'pro_price' => $this->faker->randomFloat(2, 10, 100),
            'product_id' => $this->faker->numberBetween(1, 10),
            'payment_status' => 'On Transit',
            'package_status' => 'Successfully Delivered',
        ];
    }
}
