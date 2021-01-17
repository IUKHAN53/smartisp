<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotspot extends Model
{
    protected $guarded = [];
    public function mikrotik(){
        return $this->belongsTo(Mikrotik::class);
    }
    public function hotspotuser(){
        return $this->hasMany(HotspotUser::class);
    }
    public function hotspotprofile(){
        return $this->hasMany(HotspotProfile::class);
    }

}
