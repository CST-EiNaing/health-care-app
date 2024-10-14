<?php

namespace App\Http\Controllers;

use App\Models\Ndp;
use Illuminate\Http\Request;
use App\Models\Township;
use App\Models\Nurse;
use App\Models\Booking;
use App\Models\Owner;
use App\Models\Patient;
use App\Models\Duty;
use Carbon\Carbon;

class UserViewController extends Controller
{
    public function getNurseLists()
    {
        $nurses = Nurse::with('township')->get()->map(function ($nurse) {
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
            $filterNurseIds = [];
            if ($filteredNdpIds->isNotEmpty()) {
                $nurseByNdp = Ndp::where('id', $filteredNdpIds)->pluck('nurse_id')->toArray();
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
                $nurseByNdp = Ndp::where('id', $filteredNdpIds)->pluck('nurse_id')->toArray();
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
        $township_id = (int) $request->township_id;
        $nurse_id = (int) $request->nurse_id;
        $ndp_id = (int) $request->ndp_id;
        $start_date = $request->start_date;
        $end_date =  $request->end_date;
        $township = Township::where('id', $township_id)->first();
        return view('info', compact('township_id', 'nurse_id', 'ndp_id', 'township', 'start_date', 'end_date'));
    }

    public function createPatientInfo(Request $request)
    {

        $validator = validator(
            request()->all(),
            [
                'start_date' => "required",
                'end_date' => "required",
                'township_id' => "required",
                'ndp_id' => "required",

                'owner_name' => "required",
                'owner_nrc' => "required",
                'owner_father_name' => "required",
                'patient_relative' => "required",
                'owner_phone' => "required",
                'owner_address' => "required",

                'patient_name' => "required",
                'patient_age' => "required",
                'gender' => "required",
                'diagnotic' => "required",
                'patient_phone' => "required",
                'patient_address' => "required",
            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data Perfectly!");
        }
        $owner = new Owner();
        $patient = new Patient();
        $booking = new Booking();
        $owner->name = request()->owner_name;
        $owner->nrc = request()->owner_nrc;
        $owner->father_name = request()->owner_father_name;
        $owner->patient_relative = request()->patient_relative;
        $owner->phone = request()->owner_phone;
        $owner->address = request()->owner_address;
        $owner->status = request()->status ?? '';
        $owner->remark = request()->remark ?? '';
        $owner->save();
        if ($owner) {
            $savedOwnerId = $owner->id;
            $patient->owner_id = $savedOwnerId;
            $patient->township_id = request()->township_id;
            $patient->name = request()->patient_name;
            $patient->age = request()->patient_age;
            $patient->gender = request()->gender;
            $patient->diagnotic = request()->diagnotic;
            $patient->phone = request()->patient_phone;
            $patient->address = request()->patient_address;
            $patient->status = request()->status ?? '';
            $patient->remark = request()->remark ?? '';
            $patient->save();
            if ($patient) {
                $savedPatientId = $patient->id;
                $booking->owner_id = $savedOwnerId;
                $booking->patient_id = $savedPatientId;
                $booking->ndp_id = request()->ndp_id;
                $booking->from_date = request()->start_date;
                $booking->to_date = request()->end_date;

                $ndp = Ndp::find(request()->ndp_id);
                $duty = Duty::find($ndp['duty_id']);
                $booking->service_fee = $duty['fee'];
                if ($ndp->duty_id == 1) {
                    $days = Carbon::parse($booking->from_date)->diffInDays(Carbon::parse($booking->to_date)) + 1;
                    $booking->nurse_fee = $days * $ndp->fee;
                    $booking->nurse_profit = $ndp->fee;
                } elseif ($ndp->duty_id == 2) {
                    $months = Carbon::parse($booking->from_date)->diffInMonths(Carbon::parse($booking->to_date));
                    $booking->nurse_fee = $months * $ndp->fee;
                    $booking->nurse_profit = $booking->nurse_fee * 0.5;
                }
                $booking->total = $booking->service_fee + $booking->nurse_fee;
                $booking->total_income = $booking->service_fee + $booking->nurse_profit;
                $booking->save();
            }
        }
        return view('user-booking-success', compact('booking'))->with('info_success', 'Success! Your booking was completed successfully! Thank you for choosing us.');
    }
}
