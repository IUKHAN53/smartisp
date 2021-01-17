<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $guarded = [];
    public function customer(){
        return $this->hasOne(Customer::class);
    }
}
