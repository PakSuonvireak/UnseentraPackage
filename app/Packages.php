<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{

	function destination() {
		return $this->belongsTo(Destination::class);
	}

    function itineraries(){
    	return $this->hasMany(Itineraries::class, 'package_id');
    }
}
