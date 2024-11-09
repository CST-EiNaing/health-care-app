<?php

namespace Database\Factories;

use App\Models\Nurse;
use Illuminate\Database\Eloquent\Factories\Factory;

class NurseFactory extends Factory
{
    protected $model = Nurse::class;

    // Define the list of unique names you want to use
    private static $nurseNames = ['Mya Mya', 'Hla Hla', 'Nyein Nyein', 'Thu Thu', 'Aye Aye', 'Ma Ma', 'Ei Ei'];
    private static $index = 0;

    public function definition()
    {
        // Retrieve the next unique name from the list and increment the index
        $name = self::$nurseNames[self::$index];
        self::$index = (self::$index + 1) % count(self::$nurseNames);

        return [
            'township_id' => $this->faker->numberBetween(1, 2), // Mock township_id
            'name' => $name, // Assign the unique name here
            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'nrc' => '12/OuKaNa(N)123456', // Mock NRC format
            'dob' => $this->faker->date('Y-m-d'),
            'race' => $this->faker->randomElement(['Bamar', 'Shan', 'Kachin']),
            'religion' => $this->faker->randomElement(['Buddhism', 'Christianity']),
            'maritial_status' => $this->faker->randomElement(['Single', 'Married']),
            'height' => $this->faker->numberBetween(150, 190), // Height in cm
            'weight' => $this->faker->numberBetween(50, 100), // Weight in kg
            'academic' => $this->faker->randomElement(['High School', 'Bachelor']),
            'certificate' => $this->faker->randomElement(['HCA', 'AWM', 'SPL']), // Mock certificate
            'photo' => $this->faker->image('public/images/nurses', 50, 50, 'nurse', false),
            'phone' => $this->faker->phoneNumber,
            'parent_phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'parent_address' => $this->faker->address,
            'member_code' => strtoupper($this->faker->bothify('NUR###??')),
            'daily_fee' => 1,
            'vip_fee' => 50,
            'remark' => $this->faker->numberBetween(1,3),
        ];
    }
}
