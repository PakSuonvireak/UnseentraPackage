<?php

namespace App;

use App\Itineraries;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    function itineraries(){
    	return $this->hasMany(itineraries::class, 'package_id');
    }
}
