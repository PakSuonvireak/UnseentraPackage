<?php

namespace App;

use App\Packages;
use Illuminate\Database\Eloquent\Model;

class Itineraries extends Model
{
    function package(){
    	return $this->belongsTo(Packages::class);
    }
}
