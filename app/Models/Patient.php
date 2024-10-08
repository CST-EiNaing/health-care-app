<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo('App\Models\Owner');
    }

    public function township()
    {
        return $this->belongsTo('App\Models\Township');
    }
}
