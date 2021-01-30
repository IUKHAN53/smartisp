<?php

use App\Franchise;
use Illuminate\Database\Seeder;

class FranchiseSeeder extends Seeder
{

    public function run()
    {
        Franchise::create(["id" => "1", "franchisename" => "franchise1",'mobile'=>'111111111','address'=>'bangladesh','creditlimit'=>'2000','prefix'=>'fran','division_id'=>1,'district_id'=>1,'upazila_id'=>1,'ps_id'=>1]);
        Franchise::create(["id" => "2", "franchisename" => "franchise2",'mobile'=>'111111111','address'=>'bangladesh','creditlimit'=>'2000','prefix'=>'fran','division_id'=>1,'district_id'=>1,'upazila_id'=>1,'ps_id'=>1]);
        Franchise::create(["id" => "3", "franchisename" => "franchise3",'mobile'=>'111111111','address'=>'bangladesh','creditlimit'=>'2000','prefix'=>'fran','division_id'=>1,'district_id'=>1,'upazila_id'=>1,'ps_id'=>1]);
        Franchise::create(["id" => "4", "franchisename" => "franchise4",'mobile'=>'111111111','address'=>'bangladesh','creditlimit'=>'2000','prefix'=>'fran','division_id'=>1,'district_id'=>1,'upazila_id'=>1,'ps_id'=>1]);
    }
}
