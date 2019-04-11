<?php

namespace App;

use App\Package;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    function packages() {
    	return $this->hasMany(Package::class, 'destination_id');
    }
}
