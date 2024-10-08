<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NdpFactory extends Factory
{
    protected static $dutyCounter = 0; // Counter for duty_id
    protected static $positionCounter = 0; // Counter for position_id
    protected static $descriptionCounter = 0; // Counter for description
    protected static $nurseCounter = 0; // Counter for nurse_id
    protected static $manualInserted = false; // Track manual insertion

    public function definition()
    {
        // Check if we haven't inserted the manual data yet
        if (!self::$manualInserted) {
            self::$manualInserted = true; // Ensure manual data is inserted only once
            return [
                'nurse_id'    => 2,
                'duty_id'     => 2,
                'position_id' => 1,
                'description' => 'Daily (HCA)',
                'fee'         => 15000,
            ];
        }

        $data = [
            ['description' => 'Daily (HCA)', 'fee' => 15000],
            ['description' => 'Daily (AMW)', 'fee' => 18000],
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
        $dutyId = floor(self::$dutyCounter / 4) + 1; // Four 1's, then four 2's
        if ($dutyId > 2) {
            $dutyId = 2; // Ensure that after 2 it stays as 2
        }
        self::$dutyCounter++; // Increment duty counter

        // Get the current index for position_id (cycle between 1 and 4)
        $positionId = self::$positionCounter % 4 + 1;
        self::$positionCounter++; // Increment position counter

        // Cycle nurse_id from 1 to 4, repeating each one 8 times
        $nurseId = floor(self::$nurseCounter / 8) + 1; // Each nurse_id will repeat 8 times
        if ($nurseId > 4) {
            $nurseId = 4; // Ensure it does not exceed the maximum
        }
        self::$nurseCounter++; // Increment nurse counter

        return [
            'nurse_id'    => $nurseId,
            'duty_id'     => $dutyId, // Use the duty_id in 1,1,1,1,2,2,2,2 pattern
            'position_id' => $positionId,
            'description' => $chosen['description'],
            'fee'         => $chosen['fee'],
        ];
    }
}
