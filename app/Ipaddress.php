<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipaddress extends Model
{
    protected $guarded = [];
    public function mikrotik(){
        return $this->belongsTo(Mikrotik::class);
    }
}
