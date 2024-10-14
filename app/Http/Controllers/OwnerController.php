<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function listOwner()
    {
        $owners = Owner::all();

        return view('owner.list-owner', [
            'owners' => $owners
        ]);
    }
    public function createOwner(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => "required",
                'nrc' => "required",
                'father_name' => "required",
                'patient_relative' => "required",
                'phone' => "required",
                'address' => "required",
            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }

        $owner = new Owner();

        $owner->name = request()->name;
        $owner->nrc = request()->nrc;
        $owner->father_name = request()->father_name;
        $owner->patient_relative = request()->patient_relative;
        $owner->phone = request()->phone;
        $owner->address = request()->address;
        $owner->status = request()->status;
        $owner->remark = request()->remark;

        $owner->save();


        return back()->with('info_success', 'New Owner added Successfully!');
    }
    public function deleteOwner()
    {

        $id = request()->id;

        Owner::find($id)->delete();

        return redirect('/admin/owner/list')->with('info_danger', 'Owner Deleted Successfully!');
    }
    public function updOwner()
    {
        $id = request()->id;
        $owner = Owner::find($id);
        return view('owner.upd-owner', ['owner' => $owner]);
    }
    public function updateOwner(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => "required",
                'nrc' => "required",
                'father_name' => "required",
                'patient_relative' => "required",
                'phone' => "required",
                'address' => "required",
            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }


        $owner = Owner::find(request()->id);

        $owner->name = request()->name;
        $owner->nrc = request()->nrc;
        $owner->father_name = request()->father_name;
        $owner->patient_relative = request()->patient_relative;
        $owner->phone = request()->phone;
        $owner->address = request()->address;
        $owner->status = request()->status;
        $owner->remark = request()->remark;

        $owner->save();
        return redirect('/admin/owner/list')->with('info_success', 'Owner Updated Successfully!');
    }
}
