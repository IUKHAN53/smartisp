<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotspotProfile extends Model
{
    protected $guarded = [];
    public function hotspot()
    {
        return $this->belongsTo(Hotspot::class);
    }
}
