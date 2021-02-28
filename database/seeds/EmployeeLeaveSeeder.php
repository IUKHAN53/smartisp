<?php

use App\EmployeeLeave;
use Illuminate\Database\Seeder;

class EmployeeLeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeLeave::create(['description' => 'Sick leave','employee_id'=>1, 'leave_id' => 3]);
        EmployeeLeave::create(['description' => 'Vacation leave','employee_id'=>4, 'leave_id' => 4]);
        EmployeeLeave::create(['description' => 'Feeling weird leave','employee_id'=>3, 'leave_id' => 3]);
        EmployeeLeave::create(['description' => 'IDK leave','employee_id'=>2, 'leave_id' => 4]);
    }
}
