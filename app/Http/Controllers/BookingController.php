<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ndp;
use App\Models\Owner;
use App\Models\Patient;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function listBooking()
    {
        $owners = Owner::all();
        $patients = Patient::all();
        $ndps = Ndp::all();
        $bookings = Booking::all();

        return view('booking.list-booking', [
            'owners' => $owners,
            'patients' => $patients,
            'ndps' => $ndps,
            'bookings' => $bookings
        ]);

    }

    public function createNdp()
    {
        $validatior = validator(
            request()->all(),
            [
                "owner_id" => 'required',
                "patient_id" => 'required',
                'ndp_id' => 'required',
                'from_date' => 'required',
                'to_date' => 'required',
                'service_fee' => 'required',
                'nurse_fee' => 'required',
                'total' => 'required',
                'nurse_profit' => 'required',
                'company_total' => 'required'
            ]);

            if($validatior->fails()) {
                return back()->with('info_danger', "Please Enter the Data!");
            }

            $booking = new booking();
            $booking->owner_id = request()->owner_id;
            $booking->patient_id = request()->patient_id;
            $booking->ndp_id = request()->ndp_id;
            $booking->from_date = request()->from_date;
            $booking->to_date = request()->to_date;
            $booking->service_fee = request()->service_fee;
            $booking->nurse_fee = request()->nurse_fee;
            $booking->total = request()->total;
            $booking->nurse_profit = request()->nurse_profit;
            $booking->company_total = request()->company_total;
            $booking->save();

            return back()->with('info_success', 'New Booking added Successfully!');
    }
}
