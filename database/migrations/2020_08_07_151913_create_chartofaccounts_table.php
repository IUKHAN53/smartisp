<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartofaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chartofaccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200)->nullable();
            $table->string('type', 25)->nullable()->comment('E = expense, I = income');
            $table->integer('active_status')->nullable()->default(1);
            $table->integer('identifier')->nullable();
            $table->timestamps();

            $table->integer('created_by')->nullable()->default(1)->unsigned();
            $table->unsignedBigInteger('isp_id');
            $table->foreign('isp_id')->references('id')->on('isps')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chartofaccounts');
    }
}
