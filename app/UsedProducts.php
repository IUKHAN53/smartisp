<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsedProducts extends Model
{
    protected $guarded = [];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
