<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('from_zone');
            $table->unsignedBigInteger('to_zone');
            $table->timestamps();
            $table->index('user_id');
            $table->foreign('from_zone')->references('id')->on('zones');
            $table->foreign('to_zone')->references('id')->on('zones');
        });
    }

    public function down()
    {
        Schema::dropIfExists('zone_transfers');
    }
}
