<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotspotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotspots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mikrotik_id');
            $table->string('id_in_mkt')->nullable();
            $table->string('server')->nullable();
            $table->string('name');
            $table->string('interface')->nullable();
            $table->string('address-pool')->nullable();
            $table->string('profile')->nullable();
            $table->string('idle-timeout')->nullable();
            $table->string('keepalive-timeout')->nullable();
            $table->string('login-timeout')->nullable();
            $table->string('addresses-per-mac')->nullable();
            $table->string('proxy-status')->nullable();
            $table->string('invalid')->nullable();
            $table->string('HTTPS')->nullable();
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
        Schema::dropIfExists('hotspots');
    }
}
