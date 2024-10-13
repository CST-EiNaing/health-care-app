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
            ['id' => 2, 'name' => 'KPZ Pay', 'qr_photo' => 'kpay.webp', 'account_number' => '666666'],
            ['id' => 3, 'name' => 'AYA Pay', 'qr_photo' => 'aya.webp', 'account_number' => '77777'],
            ['id' => 4, 'name' => 'CB Pay', 'qr_photo' => 'cbpay.png', 'account_number' => '999999'],
            ['id' => 5, 'name' => 'Wave Pay', 'qr_photo' => 'wave.jpg', 'account_number' => NULL],
        ]);
    }
}
