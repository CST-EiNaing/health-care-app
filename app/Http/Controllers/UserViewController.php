<?php

namespace App\Http\Controllers;

use App\Models\Ndp;
use Illuminate\Http\Request;
use App\Models\Township;
use App\Models\Nurse;
use App\Models\Booking;
use Carbon\Carbon;

class UserViewController extends Controller
{
    //
    // $booking->from_date = request()->from_date;
    // $booking->to_date = request()->to_date;
    public function getNurseLists()
    {
        // Eager load the township relation and calculate the age using Carbon
        $nurses = Nurse::with('township')->get()->map(function ($nurse) {
            // dd($nurse->dob);
            $nurse->age = Carbon::parse($nurse->dob)->age;
            return $nurse;
        });

        $townships = Township::all();
        return view('index', [
            'townships' => $townships,
            'nurses' => $nurses
        ]);
    }
    public function getAppointments()
    {
        $ndps = Ndp::select('id', 'description')->get();
        $nurses = Nurse::select('id', 'name')->get();
        $townships = Township::all();
        $start_date = Carbon::now()->toDateString(); // Current date
        $end_date = Carbon::now()->addDays(3)->toDateString(); 
        return view('select-date', compact('ndps', 'nurses', 'townships', 'start_date', 'end_date'));
    }
    public function getAvailbaleNurses(Request $request)
    {   
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $township_id = ((int) $request->township_id);
        $nurses = Nurse::where('township_id', $township_id)->get();
        $bookings = Booking::get();
        $townships = Township::all();
        $filteredNdpIds = Booking::where(function ($query) use ($start_date, $end_date) {
            $query->whereBetween('from_date', [$start_date, $end_date])
                  ->orWhereBetween('to_date', [$start_date, $end_date])
                  ->orWhere(function ($query) use ($start_date, $end_date) {
                      $query->where('from_date', '<=', $start_date)
                            ->where('to_date', '>=', $end_date);
                  });
        })->pluck('ndp_id');
        $ndpDataArray = Ndp::whereNotIn('id', $filteredNdpIds)->get();
        $nursesById = [];
        foreach ($nurses as $nurse) {
            $nursesById[$nurse['id']] = $nurse;
        }
        $ndps = [];
        foreach ($ndpDataArray as $ndp) {
            if (isset($nursesById[$ndp['nurse_id']])) {
                $ndp['nurse_data'] = $nursesById[$ndp['nurse_id']];
            } else {
                $ndp['nurse_data'] = null; 
            }
            $ndps[] = $ndp; 
        }
        return view('select-date', compact('ndps', 'townships', 'township_id','start_date', 'end_date'));
    }
    
}
