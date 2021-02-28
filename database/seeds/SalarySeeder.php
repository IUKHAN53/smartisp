<?php

use App\Employee;
use App\Salary;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'salary_for' =>'2021-07', 'status'=>'pending'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'salary_for' =>'2021-07', 'status'=>'paid'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'salary_for' =>'2021-07', 'status'=>'unpaid'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'salary_for' =>'2021-07', 'status'=>'paid'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'salary_for' =>'2021-07', 'status'=>'unpaid'] );
    }
}
