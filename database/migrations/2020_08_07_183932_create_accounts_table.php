<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('chartofaccounts_id');
            $table->timestamps();
            $table->string('balance')->nullable();
            $table->index('chartofaccounts_id');
        });
    }
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
