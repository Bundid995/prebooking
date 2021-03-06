<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = [
    	'booking_id', 'amount', 'date', 'time', 'slip', 'status'
    	];

    public function booking()
    {
		return $this->belongsTo('App\Booking');
	}
}
