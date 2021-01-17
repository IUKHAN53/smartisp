<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $guarded = [];
    public function mikrotik()
    {
        return $this->belongsTo(Mikrotik::class);
    }
}
