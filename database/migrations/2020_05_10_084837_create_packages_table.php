<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('id_in_mkt');
            $table->unsignedBigInteger('mikrotik_id');
            $table->string('name');
            $table->string('localAddress')->nullable();
            $table->string('remoteAddress')->nullable();
            $table->string('onlyOne')->nullable();
            $table->string('rateLimit')->nullable();
            $table->string('dns')->nullable();
            $table->string('synonym')->nullable();
            $table->string('price')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
