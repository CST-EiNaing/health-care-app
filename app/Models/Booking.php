<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo('App\Models\Owner');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function ndp()
    {
        return $this->belongsTo('App\Models\Ndp');
    }
}
