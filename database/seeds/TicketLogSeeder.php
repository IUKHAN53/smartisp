<?php

use App\TicketLog;
use Illuminate\Database\Seeder;

class TicketLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketLog::create(["id" => "1", "message" => "Log11231231232",'belong_Id'=>'1','user_id'=>1]);
        TicketLog::create(["id" => "2", "message" => "asdasdasdasdasd",'belong_Id'=>'1','user_id'=>1]);
        TicketLog::create(["id" => "3", "message" => "qweqwdqweqwrqw",'belong_Id'=>'1','user_id'=>1]);
        TicketLog::create(["id" => "4", "message" => "zxczxccaxzczxc5",'belong_Id'=>'1','user_id'=>1]);
    }
}
