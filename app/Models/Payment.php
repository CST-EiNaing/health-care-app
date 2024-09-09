<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

}
