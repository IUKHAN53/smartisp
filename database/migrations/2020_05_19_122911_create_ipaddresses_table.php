<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaddresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mikrotik_id');
            $table->string('id_in_mkt');
            $table->string('address');
            $table->string('network');
            $table->string('interface');
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
        Schema::dropIfExists('ipaddresses');
    }
}
