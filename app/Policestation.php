<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policestation extends Model
{
    function district(){
        return $this->hasOne(District::class);
    }
}
