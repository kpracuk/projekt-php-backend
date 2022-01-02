<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'quantity' => $this->faker->numberBetween(1, 20),
            'price_at_buy' => $this->faker->numberBetween(50, 3000),
            'status' => $this->faker->randomElement(['placed', 'confirmed', 'in_progress', 'waiting_for_transport', 'sent', 'delivered'])
        ];
    }
}
