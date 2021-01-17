<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->string('franchisename');
            $table->string('mobile');
            $table->string('address');
            $table->string('creditlimit');
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('franchises');
    }
}
