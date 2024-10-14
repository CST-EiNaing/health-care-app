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

    public function completePayment()
    {
        
    }
}
