<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotspotUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotspot_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotspot_id');
            $table->string('id_in_mkt')->nullable();
            $table->string('name');
            $table->string('password')->nullable();
            $table->string('profile')->nullable();
            $table->string('limit-uptime')->nullable();
            $table->string('limit-bytes-total')->nullable();
            $table->string('uptime')->nullable();
            $table->string('bytes-in')->nullable();
            $table->string('bytes-out')->nullable();
            $table->string('packets-in')->nullable();
            $table->string('packets-out')->nullable();
            $table->string('dynamic')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
            $table->unique(['hotspot_id', 'name']);
            $table->foreign('hotspot_id')->references('id')->on('hotspots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotspot_users');
    }
}
