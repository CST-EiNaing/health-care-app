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
        $townships = Township::all();
        if (!$request->township_id) {
            $start_date = Carbon::now()->toDateString(); // Current date
            $end_date = Carbon::now()->addDays(3)->toDateString();
            $township_id = !empty($townships) && isset($townships[0]->id) ? (int) $townships[0]->id : null;
            $nurses = Nurse::where('township_id', $township_id)->get();
            $nurseIds = $nurses->pluck('id')->toArray();
            $filteredNdpIds = Booking::where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('from_date', [$start_date, $end_date])
                    ->orWhereBetween('to_date', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('from_date', '<=', $start_date)
                            ->where('to_date', '>=', $end_date);
                    });
            })->pluck('ndp_id');
            $nurseByNdp = Ndp::where('id', $filteredNdpIds)->distinct()->pluck('nurse_id')->toArray();
            $filterNurseIds = array_diff($nurseIds, $nurseByNdp);
            $filterNurses = Nurse::whereIn('id', $filterNurseIds)
                ->get()
                ->map(function ($nurse) {
                    $ndpArray = Ndp::where('nurse_id', $nurse->id)->get();
                    return [
                        'id' => $nurse->id,
                        'township_id' => $nurse->township_id,
                        'township_name' => $nurse->township->name,
                        'name' => $nurse->name,
                        'photo' => $nurse->photo,
                        'father_name' => $nurse->father_name,
                        'mother_name' => $nurse->mother_name,
                        'nrc' => $nurse->nrc,
                        'dob' => $nurse->dob,
                        'race' => $nurse->race,
                        'religion' => $nurse->religion,
                        'maritial_status' => $nurse->maritial_status,
                        'height' => $nurse->height,
                        'weight' => $nurse->weight,
                        'academic' => $nurse->academic,
                        'certificate' => $nurse->certificate,
                        'member_code' => $nurse->member_code,
                        'remark' => $nurse->remark,
                        'ndp' => $ndpArray
                    ];
                });
            return view('select-date', compact('filterNurses',  'townships', 'township_id', 'start_date', 'end_date'));
        } else {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $township_id = (int) $request->township_id;
            $nurses = Nurse::where('township_id', $township_id)->get();
            $nurseIds = $nurses->pluck('id')->toArray();
            $filteredNdpIds = Booking::where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('from_date', [$start_date, $end_date])
                    ->orWhereBetween('to_date', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('from_date', '<=', $start_date)
                            ->where('to_date', '>=', $end_date);
                    });
            })->pluck('ndp_id');
            $filterNurseIds = [];
            if ($filteredNdpIds->isNotEmpty()) {
                $nurseByNdp = Ndp::where('id', $filteredNdpIds)->distinct()->pluck('nurse_id')->toArray();
                $filterNurseIds = array_diff($nurseIds, $nurseByNdp);
            } else {
                $filterNurseIds = $nurseIds;
            }
            $filterNurses = Nurse::whereIn('id', $filterNurseIds)
                ->get()
                ->map(function ($nurse) {
                    $ndpArray = Ndp::where('nurse_id', $nurse->id)->get();
                    return [
                        'id' => $nurse->id,
                        'township_id' => $nurse->township_id,
                        'township_name' => $nurse->township->name,
                        'name' => $nurse->name,
                        'photo' => $nurse->photo,
                        'father_name' => $nurse->father_name,
                        'mother_name' => $nurse->mother_name,
                        'nrc' => $nurse->nrc,
                        'dob' => $nurse->dob,
                        'race' => $nurse->race,
                        'religion' => $nurse->religion,
                        'maritial_status' => $nurse->maritial_status,
                        'height' => $nurse->height,
                        'weight' => $nurse->weight,
                        'academic' => $nurse->academic,
                        'certificate' => $nurse->certificate,
                        'member_code' => $nurse->member_code,
                        'remark' => $nurse->remark,
                        'ndp' => $ndpArray
                    ];
                });
            return view('select-date', compact('filterNurses',  'townships', 'township_id', 'start_date', 'end_date'));
        }
    }

    public function showPatientInfo(Request $request)
    {
        $township_id = (int) $request->id;
        $start_date = $request->start_date;
        $end_date =  $request->end_date;
        $township = Township::where('id', $township_id)->first();
        return view('info', compact('township_id', 'township', 'start_date', 'end_date'));
    }
}
