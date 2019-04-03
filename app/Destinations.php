<?php

namespace App;

use App\Packages;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    function packages() {
    	return $this->hasMany(Packages::class, 'destination_id');
    }
}
