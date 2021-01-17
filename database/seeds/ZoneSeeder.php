<?php

use App\Customer_type;
use App\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create(["name" => "zone1", "abbr" => "z-1","area_owner"=> "irfan","employee"=>"idk"]);
        Zone::create(["name" => "zone2", "abbr" => "z-2","area_owner"=> "nayeem","employee"=>"wit"]);
    }
}
