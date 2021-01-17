<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotspotUser extends Model
{
    protected $guarded = [];
    public function hotspot(){
        return $this->belongsTo(Hotspot::class);
    }
}
