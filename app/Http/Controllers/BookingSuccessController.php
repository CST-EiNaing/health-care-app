<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingSuccessController extends Controller
{
    public function showBookingSuccess() {
        return view('user-booking-success');
    }
}
