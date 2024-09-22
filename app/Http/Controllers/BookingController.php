<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ndp;
use App\Models\Owner;
use App\Models\Patient;
use App\Models\Duty;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function listBooking()
    {
        $owners = Owner::all();
        $patients = Patient::all();
        $ndps = Ndp::all();
        $bookings = Booking::all();
        $duties = Duty::all();

        return view('booking.list-booking', [
            'owners' => $owners,
            'patients' => $patients,
            'ndps' => $ndps,
            'bookings' => $bookings,
            'duties' => $duties
        ]);
    }

    public function createBooking()
    {
        $validatior = validator(
            request()->all(),
            [
                'owner_id' => 'required|exists:owners,id',
                'patient_id' => 'required|exists:patients,id',
                'ndp_id' => 'required|exists:ndps,id',
                'from_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:from_date',
                'service_fee' => 'required|numeric',
                'nurse_fee' => 'required|numeric',
            ]
        );

        if ($validatior->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }

        $booking = new Booking();
        $booking->owner_id = request()->owner_id;
        $booking->patient_id = request()->patient_id;
        $booking->ndp_id = request()->ndp_id;
        $booking->from_date = request()->from_date;
        $booking->to_date = request()->to_date;
        $booking->service_fee = request()->service_fee;

        // Retrieve the related NDP entry to check duty_id
        $ndp = Ndp::find(request()->ndp_id);

        if ($ndp->duty_id == 1) {
            // Daily Rate Calculation
            $days = Carbon::parse($booking->from_date)->diffInDays(Carbon::parse($booking->to_date)) + 1;
            $booking->nurse_fee = $days * $ndp->fee;
            $booking->nurse_profit = $ndp->fee;
            // dd($days);
        } elseif ($ndp->duty_id == 2) {
            // Monthly Rate Calculation
            $months = Carbon::parse($booking->from_date)->diffInMonths(Carbon::parse($booking->to_date));
            $booking->nurse_fee = $months * $ndp->fee;
            $booking->nurse_profit = $booking->nurse_fee * 0.5; // Assuming 50% is the profit
            // dd($months);
        }

        $booking->total = $booking->service_fee + $booking->nurse_fee;
        $booking->total_income = $booking->service_fee + $booking->nurse_profit;

        // dd($booking);

        $booking->save();


        return back()->with('info_success', 'New Booking added Successfully!');
    }

    public function deleteBooking()
    {
        $id = request()->id;

        Booking::find($id)->delete();

        return back()->with('info_danger', "Booking deleted successfully!");
    }

    public function updBooking()
    {
        $id = request()->id;
        $booking = Booking::find($id);
        $owners = Owner::all();
        $patients = Patient::all();
        $ndps = Ndp::all();

        return view('booking.upd-booking', [
            'booking' => $booking,
            'owners' => $owners,
            'patients' => $patients,
            'ndps' => $ndps
        ]);
    }

    public function updateBooking($id)
    {
        // dd(request()->all());
        $validator = validator(
            request()->all(),
            [
                'owner_id' => 'required|exists:owners,id',
                'patient_id' => 'required|exists:patients,id',
                'ndp_id' => 'required|exists:ndps,id',
                'from_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:from_date',
                'service_fee' => 'required|numeric',
                'nurse_fee' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }

        // Retrieve the existing booking by its ID
        $booking = Booking::find($id);

        if (!$booking) {
            return back()->with('info_danger', "Booking not found!");
        }

        // Update the booking fields with the new values
        $booking->owner_id = request()->owner_id;
        $booking->patient_id = request()->patient_id;
        $booking->ndp_id = request()->ndp_id;
        $booking->from_date = request()->from_date;
        $booking->to_date = request()->to_date;
        $booking->service_fee = request()->service_fee;

        // Retrieve the related NDP entry to check duty_id
        $ndp = Ndp::find(request()->ndp_id);

        if ($ndp->duty_id == 1) {
            // Daily Rate Calculation
            $days = Carbon::parse($booking->from_date)->diffInDays(Carbon::parse($booking->to_date)) + 1;
            $booking->nurse_fee = $days * $ndp->fee;
            $booking->nurse_profit = $ndp->fee; // Assuming nurse_profit is fee for daily rate
        } elseif ($ndp->duty_id == 2) {
            // Monthly Rate Calculation
            $months = Carbon::parse($booking->from_date)->diffInMonths(Carbon::parse($booking->to_date));
            $booking->nurse_fee = $months * $ndp->fee;
            $booking->nurse_profit = $booking->nurse_fee * 0.5; // Assuming 50% is the profit
        }

        $booking->total = $booking->service_fee + $booking->nurse_fee;
        $booking->total_income = $booking->service_fee + $booking->nurse_profit;

        // Save the updated booking
        $booking->save();

        return redirect('admin/booking/list')->with('info_success', 'Booking updated successfully!');
    }
}
