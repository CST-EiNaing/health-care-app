<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NdpFactory extends Factory
{
    protected static $dutyCounter = 0; // Counter for duty_id
    protected static $positionCounter = 0; // Counter for position_id
    protected static $descriptionCounter = 0; // Counter for description

    // Predefine data for each nurse_id
    protected $manualNurseData = [
        1 => [
            ['description' => 'Daily (HCA)', 'fee' => 15000],
            ['description' => 'Daily (AMW)', 'fee' => 18000],
            ['description' => 'Daily (CGV)', 'fee' => 18000],
            ['description' => 'Daily (SPL)', 'fee' => 35000],
            ['description' => 'VIP (HCA)', 'fee' => 380000],
            ['description' => 'VIP (AMW)', 'fee' => 500000],
            ['description' => 'VIP (CGV)', 'fee' => 500000],
            ['description' => 'VIP (SPL)', 'fee' => 900000],
        ],
        2 => [
            ['description' => 'Daily (HCA)', 'fee' => 16000],
            ['description' => 'Daily (AMW)', 'fee' => 19000],
            ['description' => 'Daily (CGV)', 'fee' => 19000],
            ['description' => 'Daily (SPL)', 'fee' => 36000],
            ['description' => 'VIP (HCA)', 'fee' => 390000],
            ['description' => 'VIP (AMW)', 'fee' => 510000],
            ['description' => 'VIP (CGV)', 'fee' => 510000],
            ['description' => 'VIP (SPL)', 'fee' => 910000],
        ],
        3 => [
            ['description' => 'Daily (HCA)', 'fee' => 17000],
            ['description' => 'Daily (AMW)', 'fee' => 20000],
            ['description' => 'Daily (CGV)', 'fee' => 20000],
            ['description' => 'Daily (SPL)', 'fee' => 37000],
            ['description' => 'VIP (HCA)', 'fee' => 400000],
            ['description' => 'VIP (AMW)', 'fee' => 520000],
            ['description' => 'VIP (CGV)', 'fee' => 520000],
            ['description' => 'VIP (SPL)', 'fee' => 920000],
        ],
        4 => [
            ['description' => 'Daily (HCA)', 'fee' => 18000],
            ['description' => 'Daily (AMW)', 'fee' => 21000],
            ['description' => 'Daily (CGV)', 'fee' => 21000],
            ['description' => 'Daily (SPL)', 'fee' => 38000],
            ['description' => 'VIP (HCA)', 'fee' => 410000],
            ['description' => 'VIP (AMW)', 'fee' => 530000],
            ['description' => 'VIP (CGV)', 'fee' => 530000],
            ['description' => 'VIP (SPL)', 'fee' => 930000],
        ],
        5 => [
            ['description' => 'Daily (HCA)', 'fee' => 19000],
            ['description' => 'Daily (AMW)', 'fee' => 22000],
            ['description' => 'Daily (CGV)', 'fee' => 22000],
            ['description' => 'Daily (SPL)', 'fee' => 39000],
            ['description' => 'VIP (HCA)', 'fee' => 420000],
            ['description' => 'VIP (AMW)', 'fee' => 540000],
            ['description' => 'VIP (CGV)', 'fee' => 540000],
            ['description' => 'VIP (SPL)', 'fee' => 940000],
        ],
        6 => [
            ['description' => 'Daily (HCA)', 'fee' => 20000],
            ['description' => 'Daily (AMW)', 'fee' => 23000],
            ['description' => 'Daily (CGV)', 'fee' => 23000],
            ['description' => 'Daily (SPL)', 'fee' => 40000],
            ['description' => 'VIP (HCA)', 'fee' => 430000],
            ['description' => 'VIP (AMW)', 'fee' => 550000],
            ['description' => 'VIP (CGV)', 'fee' => 550000],
            ['description' => 'VIP (SPL)', 'fee' => 950000],
        ],
        7 => [
            ['description' => 'Daily (HCA)', 'fee' => 21000],
            ['description' => 'Daily (AMW)', 'fee' => 24000],
            ['description' => 'Daily (CGV)', 'fee' => 24000],
            ['description' => 'Daily (SPL)', 'fee' => 41000],
            ['description' => 'VIP (HCA)', 'fee' => 440000],
            ['description' => 'VIP (AMW)', 'fee' => 560000],
            ['description' => 'VIP (CGV)', 'fee' => 560000],
            ['description' => 'VIP (SPL)', 'fee' => 960000],
        ],
    ];

    public function definition()
    {
        // Determine nurse_id (1 to 7)
        $nurseId = floor(self::$descriptionCounter / 8) % 7 + 1; // Each nurse_id will repeat 8 times

        // Get the duty_id in a pattern (four 1's, then four 2's) for each nurse_id
        $dutyId = ($this->getDutyIdForNurse($nurseId)); // Get the duty_id based on the nurse_id
        
        // Cycle through position_id from 1 to 4
        $positionId = self::$positionCounter % 4 + 1;
        self::$positionCounter++;

        // Get the description and fee based on the current nurse_id
        $currentNurseData = $this->manualNurseData[$nurseId];
        $chosen = $currentNurseData[self::$descriptionCounter % count($currentNurseData)];
        self::$descriptionCounter++;

        return [
            'nurse_id'    => $nurseId,
            'duty_id'     => $dutyId,
            'position_id' => $positionId,
            'description' => $chosen['description'],
            'fee'         => $chosen['fee'],
        ];
    }

    // Method to define duty_id pattern for each nurse_id
    private function getDutyIdForNurse($nurseId)
    {
        // For nurse_id 1 and 2, return the duty_id pattern 11112222
        $dutyPattern = [
            1 => [1, 1, 1, 1, 2, 2, 2, 2],
            2 => [1, 1, 1, 1, 2, 2, 2, 2],
            3 => [1, 1, 1, 1, 2, 2, 2, 2],
            4 => [1, 1, 1, 1, 2, 2, 2, 2],
            5 => [1, 1, 1, 1, 2, 2, 2, 2],
            6 => [1, 1, 1, 1, 2, 2, 2, 2],
            7 => [1, 1, 1, 1, 2, 2, 2, 2],
        ];

        // Determine the index based on the dutyCounter
        $index = self::$dutyCounter % 8; // Each nurse_id has 8 entries (4 of 1 and 4 of 2)
        self::$dutyCounter++; // Increment the dutyCounter for the next call

        return $dutyPattern[$nurseId][$index];
    }
}
