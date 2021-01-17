<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    protected $guarded = [];
    public function purchase_orders(){
        return $this->hasMany(PurchaseOrder::class);
    }
}
