<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $paymentMethods = [
            'Cash',
            'KPZ Pay',
            'AYA Pay',
            'CB Pay',
            'Wave Pay'
        ];
        foreach ($paymentMethods as $method) {
            PaymentMethod::create(['name' => $method]);
        }
    }
}
