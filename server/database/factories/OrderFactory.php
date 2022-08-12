<?php

namespace Database\Factories;

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
            'address' => $this->faker->address(),
            'total_quantity' => rand(1,100),
            'total_price' => $this->faker->randomFloat(2, 1, 1000),
            'status' => rand(1,5)
        ];
    }
}
