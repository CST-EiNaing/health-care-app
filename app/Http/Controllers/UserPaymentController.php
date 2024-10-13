<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentMethod;

class UserPaymentController extends Controller
{
    //

    public function getQR()
    {
        $payment_methods = PaymentMethod::all();
        $payments = Payment::all();

        return view('user-payment', [
            'payment_methods' => $payment_methods,
            'payments' => $payments
        ]);
    }
}
