<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function listPatient()
    {
        $patients = Patient::all();

        return view('patient.list-patient', [
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

        $patient->owner_id = request()->name;
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
        return view('patient.upd-patient', ['patient' => $patient]);
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

        $patient->owner_id = request()->name;
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
