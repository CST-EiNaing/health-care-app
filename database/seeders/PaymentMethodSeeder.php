<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('payment_methods')->insert([
            ['id' => 1, 'name' => 'Cash', 'qr_photo' => 'images.png', 'account_number' => '33333333'],
            ['id' => 2, 'name' => 'KPZ Pay', 'qr_photo' => 'bigstock-Female-hacker-hacking-security-351691055.jpg', 'account_number' => '666666'],
            ['id' => 3, 'name' => 'AYA Pay', 'qr_photo' => 'WIN_20240902_02_10_41_Pro.jpg', 'account_number' => '77777'],
            ['id' => 4, 'name' => 'CB Pay', 'qr_photo' => 'WIN_20240908_09_55_09_Pro.jpg', 'account_number' => '999999'],
            ['id' => 5, 'name' => 'Wave Pay', 'qr_photo' => 'images.png', 'account_number' => NULL],
        ]);
    }
}
