<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('leave_id')->references('id')->on('leaves');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_leaves');
    }
}
