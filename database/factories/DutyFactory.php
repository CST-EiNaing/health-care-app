<?php

namespace Database\Factories;

use App\Models\Duty;
use Illuminate\Database\Eloquent\Factories\Factory;

class DutyFactory extends Factory
{
    protected $model = Duty::class;

    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,
            'fee' => $this->faker->numberBetween(10000, 150000),
        ];
    }

    // Custom states for Daily and VIP duties
    public function daily()
    {
        return $this->state([
            'name' => 'Daily',
            'fee' => 20000,
        ]);
    }

    public function vip()
    {
        return $this->state([
            'name' => 'VIP',
            'fee' => 120000,
        ]);
    }
}
