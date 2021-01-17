<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intrface extends Model
{
    protected $guarded = [];
    public function mikrotik(){
        return $this->belongsTo(Mikrotik::class);
    }
}
