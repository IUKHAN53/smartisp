<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'id' => 1,
            'name' => 'Irfan Ullah',
            'username' => 'iukhan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Role::create(['name' => 'Franchise']);
        Role::create(['name' => 'Pop']);
        Role::create(['name' => 'PopUser']);
        Role::create(['name' => 'FranchiseUser']);
        $role = Role::create(['name' => 'SuperAdmin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}

