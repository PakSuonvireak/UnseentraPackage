<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

	function destination() {
		return $this->belongsTo(Destination::class);
	}

    function itineraries(){
    	return $this->hasMany(Itinerary::class, 'package_id');
    }
}
