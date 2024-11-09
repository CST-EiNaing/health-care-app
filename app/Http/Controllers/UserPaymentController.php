<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentMethod;

class UserPaymentController extends Controller
{
    //

    public function getQR(Request $request)
    {
        $booking_id = $request->booking_id; // Assuming you're passing this from the previous form
        // Assuming you have a way to get the owner's name from the booking
        $booking = Booking::find($booking_id); // Retrieve booking details
        $owner_name = $booking->owner->name; // Get the owner's name
        $total = $booking->total; // Assuming you have the total amount stored in the booking

        $payment_methods = PaymentMethod::all();

        return view('user-payment', [
            'payment_methods' => $payment_methods,
            'booking_id' => $booking_id, // Pass booking_id to the view
            'owner_name' => $owner_name, // Pass owner's name to the view
            'total' => $total, // Pass total to the view
        ]);
    }

    public function completePayment(Request $request)
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
        $payment->remark = request()->remark;
        $payment->save();
        return view('payment-success')->with('info_success', 'Payment Completed Successfully!');
    }
}


// class UserPaymentController extends Controller
// {
//     public function getQR(Request $request)
//     {
//         $booking_id = $request->booking_id;
//         $booking = Booking::find($booking_id);
//         $owner_name = $booking->owner->name;
//         $total = $booking->total;
//         $payment_methods = PaymentMethod::all();

//         return view('user-payment', [
//             'payment_methods' => $payment_methods,
//             'booking_id' => $booking_id,
//             'owner_name' => $owner_name,
//             'total' => $total,
//         ]);
//     }

//     public function completePayment(Request $request)
//     {
//         $validator = $request->validate([
//             'booking_id' => 'required',
//             'payment_method_id' => 'required',
//             'amount' => 'required',
//         ]);
    
//         $paymentResult = $request->input('paymentResult');
//         if (empty($paymentResult)) {
//             return back()->with('info_danger', 'Payment result data is missing.');
//         }
//         dd($request->all());
    
//         $secretKey = "7f4917e39f698ac433ac1d207e139adc";
//         $decrypted = openssl_decrypt($paymentResult, "AES-256-ECB", $secretKey);
    
//         $decryptedValues = json_decode($decrypted, true);
//         if (!$decryptedValues) {
//             return back()->with('info_danger', 'Failed to process payment data.');
//         }
    
//         if ($decryptedValues["transactionStatus"] === 'SUCCESS') {
//             Payment::create([
//                 'booking_id' => $request->booking_id,
//                 'payment_method_id' => $request->payment_method_id,
//                 'amount' => $request->amount,
//                 'remark' => $request->remark,
//                 'transaction_id' => $decryptedValues["transactionId"],
//                 'status' => 'Completed',
//             ]);
    
//             return view('payment-success')->with('info_success', 'Payment Completed Successfully!');
//         }
    
//         return back()->with('info_danger', "Payment failed. Please try again.");
//     }
    
// }
