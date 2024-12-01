<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\Township;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    //
    public function listNurse()
    {
        $townships = Township::all();
        $nurses = Nurse::all();

        return view('nurse.list-nurse', [
            'townships' => $townships,
            'nurses' => $nurses
        ]);
    }

    public function createNurse(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'township_id' => "required",
                'name' => "required",
                'nrc' => "required",
                'dob' => 'required',
                'race' => 'required',
                'religion' => 'required',
                'maritial_status' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'academic' => 'required',
                'certificate' => 'required',
                'photo' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'member_code' => 'required',
                'daily_fee' => 'required',
                'vip_fee' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'parent_phone' => 'required',
                'parent_address' => 'required',

            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }

        $nurse = new Nurse();

        // dd($nurse);

        $nurse->township_id = request()->township_id;
        $nurse->name = request()->name;
        $nurse->nrc = request()->nrc;
        $nurse->dob = request()->dob;
        $nurse->race = request()->race;
        $nurse->religion = request()->religion;
        $nurse->maritial_status = request()->maritial_status;
        $nurse->height = request()->height;
        $nurse->weight = request()->weight;
        $nurse->academic = request()->academic;
        $nurse->certificate = request()->certificate;
        if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/nurses',$name);

                $nurse->photo = $name;

            }
            else
            {
                $nurse->photo = '';
            }
        $nurse->phone = request()->phone;
        $nurse->address = request()->address;
        $nurse->member_code = request()->member_code;
        $nurse->daily_fee = request()->daily_fee;
        $nurse->vip_fee = request()->vip_fee;
        $nurse->father_name = request()->father_name;
        $nurse->mother_name = request()->mother_name;
        $nurse->parent_phone = request()->parent_phone;
        $nurse->parent_address = request()->parent_address;
        $nurse->save();


        return back()->with('info_success', 'New Nurse added Successfully!');
    }

    public function deleteNurse() 
    {
        $id = request()->id;
        Nurse::find($id)->delete();

        return back()->with('info_danger', "Nurse Deleted successfully!");
    }

    public function updNurse()
    {
        $id = request()->id;
        $nurse = Nurse::find($id);
        $townships = Township::all();

        return view('nurse.upd-nurse', [
            'townships' => $townships,
            'nurse' => $nurse
        ]);
    }

    public function updateNurse(Request $request) 
    {
        $validator = validator(
            request()->all(),
            [
                'township_id' => "required",
                'name' => "required",
                'nrc' => "required",
                'dob' => 'required',
                'race' => 'required',
                'religion' => 'required',
                'maritial_status' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'academic' => 'required',
                'certificate' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'member_code' => 'required',
                'daily_fee' => 'required',
                'vip_fee' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'parent_phone' => 'required',
                'parent_address' => 'required',

            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }
        $id = request()->id;

        $nurse = Nurse::find($id);

        $nurse->township_id = request()->township_id;
        $nurse->name = request()->name;
        $nurse->nrc = request()->nrc;
        $nurse->dob = request()->dob;
        $nurse->race = request()->race;
        $nurse->religion = request()->religion;
        $nurse->maritial_status = request()->maritial_status;
        $nurse->height = request()->height;
        $nurse->weight = request()->weight;
        $nurse->academic = request()->academic;
        $nurse->certificate = request()->certificate;

        if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/nurses',$name);

                $nurse->photo = $name;

            }

        $nurse->phone = request()->phone;
        $nurse->address = request()->address;
        $nurse->member_code = request()->member_code;
        $nurse->daily_fee = request()->daily_fee;
        $nurse->vip_fee = request()->vip_fee;
        $nurse->father_name = request()->father_name;
        $nurse->mother_name = request()->mother_name;
        $nurse->parent_phone = request()->parent_phone;
        $nurse->parent_address = request()->parent_address;
        $nurse->save();

        return redirect('/admin/nurse/list')->with('info_success','Nurse Updated Successfully');
    }
}
