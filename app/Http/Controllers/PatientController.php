<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Owner;
use App\Models\Township;

class PatientController extends Controller
{
    public function listPatient()
    {
        if(request()->owner_id)
        {
             $owner_id  = request()->owner_id;             
        }
        else
        {
            $owner_id = 1;           
        }

		if(request()->township_id)
        {
             $township_id  = request()->township_id;             
        }
        else
        {
            $township_id = 1;           
        }
        
        $patients       = Patient::all();
        $owners         = Owner::all();
        $townships      = Township::all();
       
        return view('patient.list-patient', [
            'owners'   => $owners,
            'townships'   => $townships,
            'patients' => $patients
        ]);
    }
    public function createPatient(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'owner_id' => "required",
                'township_id' => "required",
                'name' => "required",
                'age' => "required",
                'gender' => "required",
                'diagnotic' => "required",
                'phone' => "required",
                'address' => "required",
            ]
        );
        if ($validator->fails()) {
            return back()->with('info', "Please Enter the Data!");
        }

        $patient = new Patient();
        // $owners = new Owner();
        // $townships = new Township();
        $patient->owner_id = request()->owner_id;
        $patient->township_id = request()->township_id;
        $patient->name = request()->name;
        $patient->age = request()->age;
        $patient->gender = request()->gender;
        $patient->diagnotic = request()->diagnotic;
        $patient->phone = request()->phone;
        $patient->address = request()->address;
        $patient->status = request()->status;
        $patient->remark = request()->remark;

        $patient->save();


        return back()->with('info', 'New Patient added Successfully!');
    }
    public function deletePatient()
    {

        $id = request()->id;

        Patient::find($id)->delete();

        return redirect('/admin/patient/list')->with('info', 'Patient Deleted Successfully!');
    }
    public function updPatient()
    {
        
        $id = request()->id;
        $patient = Patient::find($id);
        return view('patient.upd-patient', [
            'patient' => $patient,
        ]);
    }
    public function updatePatient(Request $request)
    {
        
        $validator = validator(
            request()->all(),
            [
                'owner_id' => "required",
                'township_id' => "required",
                'name' => "required",
                'age' => "required",
                'gender' => "required",
                'diagnotic' => "required",
                'phone' => "required",
                'address' => "required",

            ]
        );
        if ($validator->fails()) {
            return back()->with('info', "Please Enter the Data!");
        }


        $patient = Patient::find(request()->id);
        $patient->owner_id = request()->owner_id;
        $patient->township_id = request()->township_id;
        $patient->name = request()->name;
        $patient->age = request()->age;
        $patient->gender = request()->gender;
        $patient->diagnotic = request()->diagnotic;
        $patient->phone = request()->phone;
        $patient->address = request()->address;
        $patient->status = request()->status;
        $patient->remark = request()->remark;

        $patient->save();
        return redirect('/admin/patient/list')->with('info', 'Patient Updated Successfully!');
    }
}
