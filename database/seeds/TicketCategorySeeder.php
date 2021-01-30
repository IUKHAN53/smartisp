<?php

use App\TicketCategory;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketCategory::create(["id" => "1", "name" => "category1"]);
        TicketCategory::create(["id" => "2", "name" => "category2"]);
        TicketCategory::create(["id" => "3", "name" => "category3"]);
        TicketCategory::create(["id" => "4", "name" => "category4"]);
    }
}
