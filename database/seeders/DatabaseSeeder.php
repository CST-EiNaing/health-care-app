<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Myo Htet',
            'email' => 'myo@example.com',
        ]);

        //Township
        \App\Models\Township::factory()->create([
            'name' => 'Yangon',   
        ]);

        \App\Models\Township::factory()->create([
            'name' => 'Mandalay',  
        ]);
        //Township

        //Duty
        \App\Models\Duty::factory()->daily()->create();
        \App\Models\Duty::factory()->vip()->create();
        //

        //Positon
        \App\Models\Position::factory()->hca()->create();
        \App\Models\Position::factory()->amw()->create();
        \App\Models\Position::factory()->cgv()->create();
        \App\Models\Position::factory()->spl()->create();
        //

    }
}
