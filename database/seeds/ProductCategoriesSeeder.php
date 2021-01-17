<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;
use \App\Division;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create(["id" => "1", "name" => "Routers", "status" => 1]);
        ProductCategory::create(["id" => "2", "name" => "Modems", "status" => 1]);
        ProductCategory::create(["id" => "3", "name" => "Telecom", "status" => 1]);
    }
}
