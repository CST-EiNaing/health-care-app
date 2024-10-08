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

    // public function getAvailableNurses(Request $request)
    // {   
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;
    //     $township_id = (int) $request->township_id;
        
    //     // Fetching data
    //     $nurses = Nurse::where('township_id', $township_id)->get();
    //     $bookings = Booking::get();
    //     $townships = Township::all();

    //     // dd($nurses);
        
    //     // Filtering booked ndps
    //     $filteredNdpIds = Booking::where(function ($query) use ($start_date, $end_date) {
    //         $query->whereBetween('from_date', [$start_date, $end_date])
    //               ->orWhereBetween('to_date', [$start_date, $end_date])
    //               ->orWhere(function ($query) use ($start_date, $end_date) {
    //                   $query->where('from_date', '<=', $start_date)
    //                         ->where('to_date', '>=', $end_date);
    //               });
    //     })->pluck('ndp_id');

    //     // dd($filteredNdpIds);
        
    //     // Get available NDPs
    //     $ndpDataArray = Ndp::whereNotIn('id', $filteredNdpIds)->get();
    //     // dd($ndpDataArray);
    //     $nursesById = [];
    //     foreach ($nurses as $nurse) {
    //         $nursesById[$nurse['id']] = $nurse;
    //     }

        
    //     // Assign nurse data to ndps
    //     $ndps = [];
    //     foreach ($ndpDataArray as $ndp) {
    //         $ndp['nurse_data'] = $nursesById[$ndp['nurse_id']] ?? null;
    //         $ndps[] = $ndp; 
    //     }
    
    //     // Return the view with the data and selected values
    //     return view('select-date', compact('ndps', 'nurses', 'townships', 'township_id', 'start_date', 'end_date'));
    // }
    
      

    public function getAvailableNurses(Request $request)
{
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $township_id = (int) $request->township_id;

    // 1. Filter nurses by township
    $nurses = Nurse::where('township_id', $township_id)->get();

    // 2. Get the list of nurse_ids
    $nurseIds = $nurses->pluck('id');

    // 3. Filter NDPs where nurse_id matches the filtered nurseIds
    $filteredNdpIds = Booking::where(function ($query) use ($start_date, $end_date) {
        $query->whereBetween('from_date', [$start_date, $end_date])
              ->orWhereBetween('to_date', [$start_date, $end_date])
              ->orWhere(function ($query) use ($start_date, $end_date) {
                  $query->where('from_date', '<=', $start_date)
                        ->where('to_date', '>=', $end_date);
              });
    })->pluck('ndp_id');

    // 4. Get available NDPs where nurse_id is in the filtered nurseIds
    $ndps = Ndp::whereNotIn('id', $filteredNdpIds)
                ->whereIn('nurse_id', $nurseIds)
                ->get();

    // 5. Assign nurse data to ndps
    $nursesById = $nurses->keyBy('id'); // Re-index nurses by id for easy lookup
    foreach ($ndps as $ndp) {
        $ndp['nurse_data'] = $nursesById[$ndp->nurse_id] ?? null;
    }

    // 6. Return the view with filtered data
    $townships = Township::all(); // Get townships for the dropdown
    return view('select-date', compact('ndps', 'nurses', 'townships', 'township_id', 'start_date', 'end_date'));
}


public function getInfo(Request $request)
{
    // Get the data from the form
    $id = $request->nurseById;
    // Debugging to check the incoming request data
    // dd($id); // Uncomment to see the request data

    // Fetch townships or any other data needed for the view
    $townships = Township::all();

    // Pass the data to the 'info' view
    return view('info', compact('townships'));
}


}
