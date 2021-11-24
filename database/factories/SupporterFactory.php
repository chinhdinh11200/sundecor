<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name($this->faker->numberBetween(10,20)),
            'tel' => $this->faker->phoneNumber(),
            'priority' => $this->faker->unique()->randomNumber(1,8),
            'status' => $this->faker->boolean()
        ];
    }
}
