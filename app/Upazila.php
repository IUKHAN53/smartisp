<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    function district(){
        return $this->hasOne(District::class);
    }
}
