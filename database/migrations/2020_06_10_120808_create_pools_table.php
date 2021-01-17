<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mikrotik_id');
            $table->string('id_in_mkt')->nullable();
            $table->string('name');
            $table->string('ranges');
            $table->string('status')->default('Active');
            $table->timestamps();
            $table->unique(['mikrotik_id', 'id_in_mkt']);
            $table->foreign('mikrotik_id')->references('id')->on('mikrotiks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools');
    }
}
