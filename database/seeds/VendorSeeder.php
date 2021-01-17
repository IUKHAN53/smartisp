<?php

use App\ProductVendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run()
    {
        ProductVendor::create(["id" => "1", "name" => "Barishal", "address" => "Quetta", "status" => 1, "phone"=>"12345678910","contact_person"=>"Iukhan"]);
        ProductVendor::create(["id" => "2", "name" => "Chattogram", "address" => "Pakistan", "status" => 1, "phone"=>"01234567891","contact_person"=>"Mehran"]);
        ProductVendor::create(["id" => "3", "name" => "Dhaka", "address" => "Bangladesh", "status" => 1, "phone"=>"111111111111","contact_person"=>"Nayeem"]);
        ProductVendor::create(["id" => "4", "name" => "Khulna", "address" => "Islamabad", "status" => 1, "phone"=>"222222222222","contact_person"=>"Irfan"]);

    }
}
