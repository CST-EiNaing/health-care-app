<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use App\Models\Ndp;
use App\Models\Nurse;
use App\Models\Position;
use Illuminate\Http\Request;

class NdpController extends Controller
{
    //
    public function listNdp() 
    {
        $nurses = Nurse::all();
        $duties = Duty::all();
        $positions = Position::all();
        $ndps = Ndp::all();

        return view('ndp.list-ndp', [
            'nurses' => $nurses,
            'duties' => $duties,
            'positions' => $positions,
            'ndps' => $ndps
        ]);
    }

    public function createNdp()
    {
        $validatior = validator(
            request()->all(),
            [
                "nurse_id" => 'required',
                "duty_id" => 'required',
                'position_id' => 'required',
                'description' => 'required',
                'fee' => 'required'
            ]);

            if($validatior->fails()) {
                return back()->with('info_danger', "Please Enter the Data!");
            }

            $ndp = new Ndp();
            $ndp->nurse_id = request()->nurse_id;
            $ndp->duty_id = request()->duty_id;
            $ndp->position_id = request()->position_id;
            $ndp->description = request()->description;
            $ndp->fee = request()->fee;
            $ndp->save();

            return back()->with('info_success', 'New NDP added Successfully!');
    }

    public function deleteNdp()
    {
        $id = request()->id;

        Ndp::find($id)->delete();   
        
        return back()->with('info_danger', "Ndp deleted successfully!");
    }

    public function updNdp()
    {
        $id = request()->id;
        $ndp = Ndp::find($id);
        $nurses = Nurse::all();
        $duties = Duty::all();
        $positions = Position::all(); 

        return view('ndp.upd-ndp', [
            'ndp' => $ndp,
            'duties' => $duties,
            'nurses' => $nurses,
            'positions' => $positions
        ]);
    }

    public function updateNdp()
    {
        $validatior = validator(
            request()->all(),
            [
                "nurse_id" => 'required',
                "duty_id" => 'required',
                'position_id' => 'required',
                'description' => 'required',
                'fee' => 'required'
            ]);

            if($validatior->fails()) {
                return back()->with('info_danger', "Please Enter the Data!");
            }

            $id = request()->id;
            $ndp = Ndp::find($id);

            $ndp->nurse_id = request()->nurse_id;
            $ndp->duty_id = request()->duty_id;
            $ndp->position_id = request()->position_id;
            $ndp->description = request()->description;
            $ndp->fee = request()->fee;
            $ndp->save();

            return redirect('admin/ndp/list')->with('info_success', 'NDP Updated Successfully!');
    }

}
