<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->integer('pending_amount')->default(0);
            $table->integer('amount_to_pay')->default(0);
            $table->integer('paid_amount')->default(0);
            $table->dateTime('due_date')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->timestamps();
            $table->index('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_bills');
    }
}
