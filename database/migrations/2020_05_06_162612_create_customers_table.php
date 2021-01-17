<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('reference_no');
            $table->unsignedBigInteger('zone_id');
            $table->string('reg_date');
            $table->unsignedBigInteger('customer_type_id');
            $table->string('connection_type');
            $table->string('con_date')->nullable();
//           personal info
            $table->string('full_name');
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->string('mobile_no');
            $table->string('dob');
            $table->string('gender');
            $table->string('proof_of_id');
            $table->string('id_num');
            $table->string('occupation');
            $table->string('photo')->default('assets/node_modules/dropify/src/images/test-image-1.jpg');
            $table->string('email');
//Addresss
            $table->string('pres_addr');
            $table->string('perm_addr');
            $table->string('policestation_id');
            $table->string('upazila_id');
            $table->string('district_id');
//Connection
            $table->unsignedBigInteger('mikrotik_id');
            $table->string('service')->default('pppoe');
            $table->unsignedBigInteger('package_id');
            $table->string('username');
            $table->string('password');
            $table->string('remote_address')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('remote_ip')->nullable();
            $table->string('router_comment');
            $table->string('status')->default('false');
            $table->timestamp('last_login')->nullable();
//Queue
            $table->unsignedBigInteger('queue_id');

            $table->timestamps();
//relations
            $table->index('zone_id');
            $table->index('mikrotik_id');
            $table->index('package_id');
            $table->index('customer_type_id');
            $table->index('policestation_id');
            $table->index('upazila_id');
            $table->index('district_id');
            $table->index('queue_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
