<?php

use App\Customer_type;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer_type::create(["type" => "Prepaid", "details" => "prepaid customer"]);
        Customer_type::create(["type" => "Postpaid", "details" => "postpaid customer"]);
    }
}
