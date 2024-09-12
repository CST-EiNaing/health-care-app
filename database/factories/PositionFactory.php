<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    protected $model = Position::class;

    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
        ];
    }

    // Custom states for Daily and VIP duties
    public function hca()
    {
        return $this->state([
            'name' => 'HCA',
            'description' => 'Health Care Assistant',
        ]);
    }

    public function amw()
    {
        return $this->state([
            'name' => 'AMW',
            'description' => 'Adult Medical Ward',
        ]);
    }

    public function cgv()
    {
        return $this->state([
            'name' => 'CGV',
            'description' => 'care Giver',
        ]);
    }

    public function spl()
    {
        return $this->state([
            'name' => 'SPL',
            'description' => 'Special',
        ]);
    }
}
