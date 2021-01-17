<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    function division(){
        return $this->hasOne(Division::class);
    }
    function policestation(){
        return $this->hasMany(Policestation::class);
    }
    function upazila(){
        return $this->hasMany(Upazila::class);
    }
}
