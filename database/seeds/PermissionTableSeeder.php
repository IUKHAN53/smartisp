<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'mikrotik-list',
            'mikrotik-create',
            'mikrotik-edit',
            'mikrotik-delete',
            'franchise-list',
            'franchise-create',
            'franchise-edit',
            'franchise-delete',
            'hotspot-list',
            'hotspot-create',
            'hotspot-edit',
            'hotspot-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
