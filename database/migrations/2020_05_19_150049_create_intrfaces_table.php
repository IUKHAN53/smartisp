<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntrfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intrfaces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mikrotik_id');
            $table->string('id_in_mkt');
            $table->string('name');
            $table->string('type');
            $table->string('mtu');
            $table->string('mac-address');
            $table->string('last-link-up-time')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('intrfaces');
    }
}
