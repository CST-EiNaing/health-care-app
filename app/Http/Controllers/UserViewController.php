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

    public function getAvailableNurses(Request $request)
    {   
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $township_id = (int) $request->township_id;
        
        // Fetch nurses from the selected township
        $nurses = Nurse::where('township_id', $township_id)->get();
        $townships = Township::all();
        
        // Filter bookings between the date range
        $filteredNdpIds = Booking::where(function ($query) use ($start_date, $end_date) {
            $query->whereBetween('from_date', [$start_date, $end_date])
                  ->orWhereBetween('to_date', [$start_date, $end_date])
                  ->orWhere(function ($query) use ($start_date, $end_date) {
                      $query->where('from_date', '<=', $start_date)
                            ->where('to_date', '>=', $end_date);
                  });
        })->pluck('ndp_id');
        
        // Get available NDPs (excluding booked ones)
        $ndpDataArray = Ndp::whereNotIn('id', $filteredNdpIds)->get();
        
        // Create an array to map nurses by ID and calculate their age
        $nursesById = [];
        foreach ($nurses as $nurse) {
            // Calculate the age from dob
            $nurse->age = isset($nurse->dob) ? Carbon::parse($nurse->dob)->age : 'Not provided';
            $nursesById[$nurse->id] = $nurse;
        }
        
        // Assign nurse data to available NDPs
        $ndps = [];
        foreach ($ndpDataArray as $ndp) {
            // Attach nurse data to NDPs, if exists
            $ndp['nurse_data'] = $nursesById[$ndp['nurse_id']] ?? null;
            $ndps[] = $ndp; 
        }
    
        // Return the view with the necessary data
        return view('select-date', compact('ndps', 'townships', 'township_id', 'start_date', 'end_date'));
    }
      

    public function getInfo()
    {
        $townships = Township::all();

        return view('info', compact('townships'));
    }

}
