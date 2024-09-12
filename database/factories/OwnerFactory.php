<?php

namespace Database\Factories;

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
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'nrc' => $this->faker->name,
            'father_name' => $this->faker->name,
            'patient_relative' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address
        ];
    }
    //
    public function ownerOne()
    {
        return $this->state([
            'name' => 'Zaw Hein',
            'nrc' => '8/mmn(N)234567',
            'father_name' => "fatherName",
            'patient_relative' => 'relative',
            'phone' => '09455876684',
            'address' => 'Myaing'
        ]);
    }
}
