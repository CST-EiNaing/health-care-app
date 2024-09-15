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
    protected static $dutyCounter = 0;
    protected static $positionCounter = 0;
    protected static $descriptionCounter = 0;
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
        $chosen = $data[self::$descriptionCounter % count($data)];
        self::$descriptionCounter++;

        // Generate duty_id pattern: 1,1,1,1,2,2,2,2
        $dutyId = floor(self::$dutyCounter / 4) + 1; // Divide by 4 to get four 1's, then four 2's
        if ($dutyId > 2) {
            $dutyId = 2; // Ensure that after 2 it stays as 2
        }
        self::$dutyCounter++;  // Increment duty counter

        // Get the current index for position_id (cycle between 1 and 4)
        $positionId = self::$positionCounter % 4 + 1;
        self::$positionCounter++;  // Increment position counter

        return [
            'nurse_id'    => 1,
            'duty_id'     => $dutyId, // Use the duty_id in 1,1,1,1,2,2,2,2 pattern
            'position_id' => $positionId,
            'description' => $chosen['description'],
            'fee'         => $chosen['fee'],
        ];
    }
}
