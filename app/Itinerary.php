<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    function package(){
    	return $this->belongsTo(Package::class);
    }
}
