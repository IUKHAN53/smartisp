<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('monthly_bill');
            $table->string('perm_discount');
            $table->string('billing_cycle');
            $table->string('reg_fee');
            $table->string('send_reminder_email');
            $table->string('send_reminder_sms');
            $table->string('mobile_banking');
            $table->string('bank_payment');
            $table->string('bank_name');
            $table->string('bank_account_name');
            $table->string('bank_acc_no');
            $table->string('bank_acc_branch');
            $table->timestamps();
            $table->index('customer_id');
        });
    }
    public function down()
    {
        Schema::dropIfExists('billings');
    }
}
