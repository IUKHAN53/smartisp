<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mikrotik extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function ipaddress()
    {
        return $this->hasMany(Ipaddress::class);
    }

    public function queue_type()
    {
        return $this->hasMany(Queue_type::class);
    }

    public function intrface()
    {
        return $this->hasMany(Intrface::class);
    }

    public function queue()
    {
        return $this->hasMany(Queue::class);
    }
    public function hotspot()
    {
        return $this->hasMany(Hotspot::class);
    }
    public function pool()
    {
        return $this->hasMany(Pool::class);
    }
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

}
