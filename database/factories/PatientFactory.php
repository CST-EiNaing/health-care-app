<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */

    protected $model = Patient::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']); // Randomly select gender

        return [
            'owner_id'        => $this->faker->numberBetween(1, 3), 
            'township_id'     => $this->faker->numberBetween(1, 2), 
            'name'            => $gender === 'female' 
                                    ? $this->faker->randomElement(['Daw Sein Ei', 'Daw Thu']) 
                                    : $this->faker->randomElement(['U Aung Aung', 'U Kyaw Kyaw']),
            'age'             => $this->faker->numberBetween(30, 70), 
            'gender'          => $gender, // Use the selected gender
            'diagnotic'       => $this->faker->randomElement(['Hypertension', 'Diabetes', 'Asthma', 'Cardiac Arrest', 'Pneumonia']),
            'phone'           => $this->faker->phoneNumber,
            'address'         => $this->faker->address,
        ];
    }
}
