<?php

namespace App\Http\Controllers;

use App\Models\Ndp;
use Illuminate\Http\Request;
use App\Models\Township;
use App\Models\Nurse;
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

        return view('select-date', compact('ndps', 'nurses', 'townships'));
    }

    public function getInfo()
    {
        $townships = Township::all();

        return view('info', compact('townships'));
    }

}
