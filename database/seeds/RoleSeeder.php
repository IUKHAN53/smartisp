<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Franchise']);
        Role::create(['name' => 'Pop']);
        Role::create(['name' => 'PopUser']);
        Role::create(['name' => 'FranchiseUser']);
        Role::create(['name' => 'SuperAdmin']);
    }
}

