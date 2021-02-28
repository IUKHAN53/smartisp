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
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'from' =>'2021-08-24','to'=>'2021-09-24', 'status'=>'pending'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'from' =>'2021-03-24','to'=>'2021-02-24', 'status'=>'paid'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'from' =>'2021-02-24','to'=>'2021-03-24', 'status'=>'unpaid'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'from' =>'2021-02-24','to'=>'2021-03-24', 'status'=>'paid'] );
        Salary::create(['employee_id' =>Employee::inRandomOrder()->first()->id, 'salary' => rand(15000,80000), 'from' =>'2021-03-24','to'=>'2021-02-24', 'status'=>'unpaid'] );
    }
}
