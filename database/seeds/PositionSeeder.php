<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create(['id' =>1 , 'name' => 'CEO']);
        Position::create(['id' =>2 , 'name' => 'Manager']);
        Position::create(['id' =>3 , 'name' => 'Sweeper']);
        Position::create(['id' =>4 , 'name' => 'HR Manager']);
    }
}
