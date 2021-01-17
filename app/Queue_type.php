<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue_type extends Model
{
    protected $guarded = [];
    public function mikrotik(){
        return $this->belongsTo(Mikrotik::class);
    }
    public function queue(){
        return $this->hasMany(Queue::class);
    }
}
