<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'reference_no';
    protected $guarded = [];

    public function monthly_bill(){
        return $this->hasMany(MonthlyBill::class);
    }
    public function billing(){
        return $this->hasOne(Billing::class);
    }
    public function package(){
        return $this->hasOne(Package::class);
    }
    public function mikrotik(){
        return $this->belongsTo(Mikrotik::class);
    }

}
