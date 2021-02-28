<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['id' =>1 , 'name' => 'Technical']);
        Department::create(['id' =>2 , 'name' => 'HR']);
        Department::create(['id' =>3 , 'name' => 'Administration']);
        Department::create(['id' =>4 , 'name' => 'Accounts']);
    }
}
