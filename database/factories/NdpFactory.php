<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NdpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [
            ['description' => 'Daily (HCA)', 'fee' => 15000],
            ['description' => 'Daily (AMw)', 'fee' => 18000],
            ['description' => 'Daily (CGV)', 'fee' => 18000],
            ['description' => 'Daily (SPL)', 'fee' => 35000],
            ['description' => 'VIP (HCA)', 'fee' => 380000],
            ['description' => 'VIP (AMW)', 'fee' => 500000],
            ['description' => 'VIP (CGV)', 'fee' => 500000],
            ['description' => 'VIP (SPL)', 'fee' => 900000],
        ];

        // Randomly pick one of the predefined sets
        $chosen = $this->faker->randomElement($data);

        return [
            'nurse_id'    => 1,
            'duty_id'     => $this->faker->numberBetween(1, 2),
            'position_id' => $this->faker->numberBetween(1, 4),
            'description' => $chosen['description'],
            'fee'         => $chosen['fee'],
        ];
    }
}
