<?php

use App\Leave;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Leave::create(['id' => 1, 'name'=>'Eid' ,'days' => 5]);
        Leave::create(['id' => 2, 'name'=>'Independence Day' ,'days' => 1]);
        Leave::create(['id' => 3, 'name'=>'Random' ,'days' => 3, 'type' => 'employee'] );
        Leave::create(['id' => 4, 'name'=>'idk' ,'days' => 3, 'type' => 'employee'] );
    }
}
