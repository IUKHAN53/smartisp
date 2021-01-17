<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    public function mikrotik(){
        return $this->belongsTo(Mikrotik::class);
    }
    public function customer(){
        return $this->hasMany(Customer::class);
    }
}
