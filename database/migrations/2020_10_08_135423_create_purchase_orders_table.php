<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_date');
            $table->string('lifetime');
            $table->string('warranty');
            $table->string('paid');
            $table->string('quantity');
            $table->string('price_per_piece');
            $table->string('total');
            $table->string('journal_entry');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('product_brands_id');
            $table->unsignedBigInteger('product_vendors_id');
            $table->index('user_id');
            $table->index('products_id');
            $table->index('product_brands_id');
            $table->index('product_vendors_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}
