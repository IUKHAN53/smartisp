<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded = [];
    public function account(){
        return $this->hasMany(Account::class);
    }
}
