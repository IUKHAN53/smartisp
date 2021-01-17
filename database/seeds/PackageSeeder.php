<?php

use App\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create(["id_in_mkt" => "1", "mikrotik_id" => "1","name"=> "Sample 1MB"]);
        Package::create(["id_in_mkt" => "2", "mikrotik_id" => "1","name"=> "Sample 2MB"]);
    }
}
