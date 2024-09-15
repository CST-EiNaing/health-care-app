<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    protected $model = Owner::class;

    public function definition()
    {
        return [
            'name'             => $this->faker->randomElement(['U Ba','Daw Mya','U Tun Naung']),
            'nrc'              => '8/KhaMaNa(N)123456', 
            'father_name'      => $this->faker->name('male'),
            'patient_relative' => $this->faker->randomElement(['Grand Mother', 'Grand Father', 'Uncle', 'Aunt']),
            'phone'            => $this->faker->phoneNumber,
            'address'          => $this->faker->address,
        ];
    }
}
