<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    function district(){
        return $this->hasMany(District::class);
    }
}
