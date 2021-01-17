<?php

use Illuminate\Database\Seeder;
use \App\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Division::create(["id" => "1", "name" => "Barishal", "bn_name" => "বরিশাল", "status" => "Active"]);
            Division::create(["id" => "2", "name" => "Chattogram", "bn_name" => "চট্টগ্রাম", "status" => "Active"]);
            Division::create(["id" => "3", "name" => "Dhaka", "bn_name" => "ঢাকা", "status" => "Active"]);
            Division::create(["id" => "4", "name" => "Khulna", "bn_name" => "খুলনা", "status" => "Active"]);
            Division::create(["id" => "5", "name" => "Rajshahi", "bn_name" => "রাজশাহী", "status" => "Active"]);
            Division::create(["id" => "6", "name" => "Rangpur", "bn_name" => "রংপুর", "status" => "Active"]);
            Division::create(["id" => "7", "name" => "Sylhet", "bn_name" => "সিলেট", "status" => "Active"]);
            Division::create(["id" => "8", "name" => "Mymensingh", "bn_name" => "ময়মনসিংহ", "status" => "Active"]);
    }
}
