<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ndp extends Model
{
    use HasFactory;

    public function nurse()
    {
        return $this->belongsTo('App\Models\Nurse');
    }

    public function duty()
    {
        return $this->belongsTo('App\Models\Duty');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
