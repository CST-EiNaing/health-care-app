<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Township;

class TownshipController extends Controller
{
    //
    public function listTownship()
    {
        $townships = Township::all();
 
        return view('township.list-township', [
                                                'townships'=> $townships
                                              ]);
    }

    Public function createTownship(Request $request)
   {
   	$validator = validator(request()->all(),
   		[
   			'name' => "required",
   		]);
   	if($validator-> fails())
   	{
   		return back()->with('info',"Please Enter the Data!");
   	}

   	$township = new Township();

      	$township->name        = request()->name;

   	$township->save();


   	return back()->with('info','New Township added Successfully!');
   }

   public function deleteTownship()
   {
   	
   	$id = request()->id;

   	Township::find($id)->delete();

   	return redirect('/admin/township/list')->with('info','Township Deleted Successfully!');
   }

   public function updTownship()
   {
   	$id = request()->id ;
   	$township = Township::find($id);
   	return view('township.upd-township',['township'=> $township]);
   }

   public function updateTownship(Request $request)
   {
           $validator = validator(request()->all(),
          [
              'name' => "required",
              
          ]);
          if($validator-> fails())
          {
              return back()->with('info',"Please Enter the Data!");
          }


          $township = Township::find(request()->id);
          
           $township->name        = request()->name;
          
          $township->save();
          return redirect('/admin/township/list')->with('info','Township Updated Successfully!');
   }


}
