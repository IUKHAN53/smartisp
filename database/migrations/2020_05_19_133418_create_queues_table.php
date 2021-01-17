<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mikrotik_id');
            $table->unsignedBigInteger('queue_type_id')->nullable();
            $table->string('id_in_mkt');
            $table->string('name');
            $table->string('target');
            $table->string('dst');
            $table->string('parent')->nullable();
            $table->string('packet-marks')->nullable();
            $table->string('priority')->nullable();
            $table->string('max-limit')->nullable();
            $table->string('burst-limit')->nullable();
            $table->string('burst-threshold')->nullable();
            $table->string('burst-time')->nullable();
            $table->string('burst-size')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
            $table->index('queue_type_id');
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
        Schema::dropIfExists('queues');
    }
}
