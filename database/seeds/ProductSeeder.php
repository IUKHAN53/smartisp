<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(["id"=>"1","name" => "ZondUSB", "product_categories_id" => "2", "product_units_id" => "1", "status" => 1]);
        Product::create(["id"=>"2","name" => "Wire", "product_categories_id" => "1", "product_units_id" => "3", "status" => 1]);
        Product::create(["id"=>"3","name" => "Keyboard", "product_categories_id" => "3", "product_units_id" => "2", "status" => 1]);

    }
}
