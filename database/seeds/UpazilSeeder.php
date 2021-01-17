<?php

use App\Upazila;
use Illuminate\Database\Seeder;

class UpazilSeeder extends Seeder
{
    public function run()
    {
        Upazila::create(["district_id" => "3", "name" => "KG" ,"bn_name"=> "ঢাকা", "status" => 1]);
        Upazila::create(["district_id" => "4", "name" => "Meter" ,"bn_name"=> "ফরিদপুর", "status" => 1]);
    }
}
