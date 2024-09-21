<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\PaymentMethod;

class PaymentController extends Controller
{
    public function listPayment()
    {   
        $bookings = Booking::all();
        $payment_methods = PaymentMethod::all();
        $payments = Payment::all();

        return view('payment.list-payment', [
            'bookings' => $bookings,
            'payment_methods' => $payment_methods,
            'payments' => $payments
        ]);
    }

    public function createPayment(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'booking_id' => "required",
                'payment_method_id' => "required",
                'amount' => "required",
            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }
        $payment = new Payment();
        $payment->booking_id = request()->booking_id;
        $payment->payment_method_id = request()->payment_method_id;
        $payment->amount = request()->amount;
        $payment->status = request()->status;
        $payment->remark = request()->remark;
        $payment->save();
        return back()->with('info_success', 'New Payment added Successfully!');
    }

    public function deletePayment() 
    {
        $id = request()->id;
        Payment::find($id)->delete();
        return back()->with('info_danger', "Payment Deleted successfully!");
    }

    public function updPayment()
    {
        $id = request()->id;
        $payment = Payment::find($id);
        return view('payment.upd-payment', [
            'payment' => $payment,
        ]);
    }

}
