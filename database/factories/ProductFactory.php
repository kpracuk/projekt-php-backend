<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(50, 1200),
            'quantity' => $this->faker->numberBetween(0, 400)
        ];
    }
}
