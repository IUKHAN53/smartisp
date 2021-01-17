<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [];
    public function chartofaccount(){
        return $this->belongsTo(Chartofaccount::class);
    }
    public function journal(){
        return $this->hasMany(Journal::class);
    }

}
