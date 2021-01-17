<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity')->default(0);
            $table->integer('used')->default(0);
            $table->integer('purchase_amount')->default(0);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('product_categories_id');
            $table->unsignedBigInteger('product_units_id');
            $table->timestamps();
            $table->index('product_categories_id');
            $table->index('product_units_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
