<?php

use App\ProductUnit;
use Illuminate\Database\Seeder;
use \App\Division;

class UnitSeeder extends Seeder
{
    public function run()
    {
        ProductUnit::create(["id" => "1", "name" => "KG", "status" => 1]);
        ProductUnit::create(["id" => "2", "name" => "Meter", "status" => 1]);
        ProductUnit::create(["id" => "3", "name" => "Pound", "status" => 1]);
    }
}
