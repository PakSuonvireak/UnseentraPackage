<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itineraries extends Model
{
    function package(){
    	return $this->belongsTo(Packages::class);
    }
}
