<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Township;
use App\Models\Nurse;
class UserViewController extends Controller
{
    //
    public function getNurseLists()
    {
        $townships = Township::all();
        $nurses = Nurse::all();
        return view('index', [
                'townships'=> $townships,
                'nurses'=> $nurses
            ]);
    }
}