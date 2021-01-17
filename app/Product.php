<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function purchase_orders(){
        return $this->hasMany(PurchaseOrder::class);
    }
    public function used_products(){
        return $this->hasMany(UsedProducts::class);
    }
}
