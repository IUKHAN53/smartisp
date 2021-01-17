<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SharedPopProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_pop_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pop_id');
            $table->unsignedBigInteger('package_id');
            $table->string('price');
            $table->timestamps();
            $table->foreign('pop_id')->references('id')->on('pops')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_pop_profile');

    }
}
