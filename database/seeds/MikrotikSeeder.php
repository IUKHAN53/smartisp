<?php

use App\Mikrotik;
use Illuminate\Database\Seeder;

class MikrotikSeeder extends Seeder
{
    public function run()
    {
        Mikrotik::create([
            "id" => 1,
            "user_id" => 1,
            "identity" => "SmartISP Test Radius",
            "host" => "103.136.206.2",
            "username" => "smartisp",
            "password" => "smartisp.1",
            "port" => "8728",
            "address" => "Bangladesh",
            "sitename" => "SyncIT.com",
        ]);
    }
}
