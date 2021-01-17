<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mikrotik_id');
            $table->string('id_in_mkt')->nullable();
            $table->string('name');
            $table->string('kind');
            $table->string('pcq_rate');
            $table->string('burst_rate');
            $table->string('burst_threshold');
            $table->string('burst_time');
            $table->string('pcq_classifier');
            $table->string('status')->default('Active');
            $table->timestamps();
            $table->unique(['mikrotik_id', 'name']);
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
        Schema::dropIfExists('queue_types');
    }
}
