<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use Illuminate\Http\Request;

class DutyController extends Controller
{
    //
    public function listDuty()
    {
        $duties = Duty::all();

        return view('duty.list-duty', [
            'duties' => $duties
        ]);
    }

    public function createDuty(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => "required",
                'fee' => 'required'
            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }

        $duty = new Duty();

        // dd($duty);

        $duty->name = request()->name;
        $duty->fee = request()->fee;

        $duty->save();


        return back()->with('info_success', 'New Duty added Successfully!');
    }

    public function deleteDuty()
    {
        
        $id = request()->id;
 
        Duty::find($id)->delete();
 
        return redirect('/admin/duty/list')->with('info_danger','Duty Deleted Successfully!');
    }

    public function updDuty()
    {
        $id = request()->id;
        $duty = Duty::find($id);
        return view('duty.upd-duty',['duty'=> $duty]);
    }

    public function updateDuty(Request $request)
    {
            $validator = validator(request()->all(),
           [
               'name' => "required",
               'fee' => 'required'
               
           ]);
           if($validator-> fails())
           {
               return back()->with('info_danger',"Please Enter the Data!");
           }
 
 
           $duty = Duty::find(request()->id);
           
            $duty->name = request()->name;
            $duty->fee = request()->fee;
           
           $duty->save();
           return redirect('/admin/duty/list')->with('info_success','Duty Updated Successfully!');
    }
}
