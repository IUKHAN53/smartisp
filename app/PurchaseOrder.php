<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product_brand(){
        return $this->hasOne(ProductBrand::class);
    }
    public function product(){
        return $this->hasOne(Product::class);
    }
    public function product_vendor(){
        return $this->hasOne(ProductVendor::class);
    }
}
