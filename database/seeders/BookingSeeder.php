<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'owner_id' => 1,
                'patient_id' => 1,
                'ndp_id' => 5,
                'from_date' => '2024-09-21',
                'to_date' => '2024-10-22',
                'service_fee' => 120000,
                'nurse_fee' => 380000,
                'total' => 500000,
                'nurse_profit' => 190000,
                'total_income' => 310000,
                'status' => '',
                'remark' => '',
            ],
        ]);
    }
}
