<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    //
    public function listPosition()
    {
        $positions = Position::all();

        return view('position.list-position', [
            'positions' => $positions
        ]);
    }

    public function createPosition(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => "required",
                'description' => 'required'
            ]
        );
        if ($validator->fails()) {
            return back()->with('info', "Please Enter the Data!");
        }

        $positon = new Position();

        // dd($duty);

        $positon->name = request()->name;
        $positon->description = request()->description;

        $positon->save();


        return back()->with('info', 'New Positon added Successfully!');
    }

    public function deletePosition()
    {
        
        $id = request()->id;
 
        Position::find($id)->delete();
 
        return redirect('/admin/position/list')->with('info','Position Deleted Successfully!');
    }

    public function updPosition()
    {
        $id = request()->id;
        $position = Position::find($id);
        return view('position.upd-position',['position'=> $position]);
    }

    public function updatePosition(Request $request)
    {
            $validator = validator(request()->all(),
           [
               'name' => "required",
               'description' => 'required'
               
           ]);
           if($validator-> fails())
           {
               return back()->with('info',"Please Enter the Data!");
           }
 
 
           $position = Position::find(request()->id);
           
            $position->name = request()->name;
            $position->description = request()->description;
           
           $position->save();
           return redirect('/admin/position/list')->with('info','Position Updated Successfully!');
    }
}
