<?php

use App\ProductBrand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductBrand::create(["id" => "1", "name" => "HP", "status" => 1]);
        ProductBrand::create(["id" => "2", "name" => "Dell", "status" => 1]);
        ProductBrand::create(["id" => "3", "name" => "Huawei", "status" => 1]);
        ProductBrand::create(["id" => "4", "name" => "Samsung", "status" => 1]);
    }
}
