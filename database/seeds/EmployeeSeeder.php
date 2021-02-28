<?php

use App\Employee;
use App\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create(['id'=>1,'user_id' =>User::inRandomOrder()->first()->id, 'position_id' => 1]);
        Employee::create(['id'=>2,'user_id' =>User::inRandomOrder()->first()->id, 'position_id' => 2]);
        Employee::create(['id'=>3,'user_id' =>User::inRandomOrder()->first()->id, 'position_id' => 3]);
        Employee::create(['id'=>4,'user_id' =>User::inRandomOrder()->first()->id, 'position_id' => 4]);
    }
}
