<?php

use App\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create(["id" => "1", "title" => "ticket",'content'=>'Sampleeeeeeeeeee','status'=>'pending','ticket_category_id'=>1,'priority'=>'medium','assigned_to_id'=>1,'franchise_id'=>1,'ticket_by_id'=>1]);
        Ticket::create(["id" => "2", "title" => "ticket2",'content'=>'Sampleeeeeeeeeee','status'=>'complete','ticket_category_id'=>2,'priority'=>'low','assigned_to_id'=>1,'franchise_id'=>1,'ticket_by_id'=>1]);
        Ticket::create(["id" => "3", "title" => "ticket3",'content'=>'Sampleeeeeeeeeee','status'=>'in-progress','ticket_category_id'=>3,'priority'=>'high','assigned_to_id'=>1,'franchise_id'=>1,'ticket_by_id'=>1]);
        Ticket::create(["id" => "4", "title" => "ticket4",'content'=>'Sampleeeeeeeeeee','status'=>'pending','ticket_category_id'=>4,'priority'=>'medium','assigned_to_id'=>1,'franchise_id'=>1,'ticket_by_id'=>1]);
    }
}
