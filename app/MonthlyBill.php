<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyBill extends Model
{
    protected $guarded = [];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
