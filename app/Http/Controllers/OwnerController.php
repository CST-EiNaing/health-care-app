<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    //owner list
    public function listOwner()
    {
        $owners = Owner::all();
        return view('owner.list-owner', ['owners' => $owners]);
    }
    public function createOwner(Request $request)
    {
        // dd($request->toArray());
        $validator = validator(
            request()->all(),
            [
                'name' => "required",
                'nrc' => 'required',
                'father_name' => 'required',
                'patient_relative' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]
        );
        if ($validator->fails()) {
            return back()->with('info', "Please Enter the Data!");
        }
        $owner = new Owner();

        // dd($duty);

        $owner->name = request()->name;
        $owner->nrc = request()->nrc;
        $owner->father_name = request()->father_name;
        $owner->patient_relative = request()->patient_relative;
        $owner->phone = request()->phone;
        $owner->address = request()->address;
        $owner->save();
        return back()->with('info', 'New Positon added Successfully!');
    }
    //delete owner
    public function deleteOwner($id)
    {
        Owner::where('id', $id)->delete();
        return back()->with('info', 'Owner Info Deleted');
    }
    //update page for owner 
    public function updOwner()
    {
        $id =  request()->id;
        $owner = Owner::find($id);
        return view('owner.upd-owner', ['owner' => $owner]);
    }
    public function updateOwner(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => "required",
                'nrc' => 'required',
                'father_name' => 'required',
                'patient_relative' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]
        );
        if ($validator->fails()) {
            return back()->with('info', "Please Enter the Data!");
        }
        $owner = Owner::find(request()->id);

        // dd($duty);

        $owner->name = request()->name;
        $owner->nrc = request()->nrc;
        $owner->father_name = request()->father_name;
        $owner->patient_relative = request()->patient_relative;
        $owner->phone = request()->phone;
        $owner->address = request()->address;
        $owner->save();
        return redirect('/admin/owner/list')->with('info', 'New Positon added Successfully!');
    }
}
