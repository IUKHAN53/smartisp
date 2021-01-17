<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pops', function (Blueprint $table) {
            $table->id();
            $table->string('popname');
            $table->string('mobile');
            $table->string('address');
            $table->string('prefix');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');;
            $table->unsignedBigInteger('upazila_id');;
            $table->unsignedBigInteger('ps_id');;
            $table->timestamps();
            $table->index('division_id');
            $table->index('district_id');
            $table->index('upazila_id');
            $table->index('ps_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pops');
    }
}
