<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->unsignedBigInteger('delivery_id')->unsigned();
            $table->unsignedBigInteger('rate_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->float('price');
            $table->string('address');
            $table->timestamps();
        });

        Schema::table('orders', function($table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('rate_id')->references('id')->on('rates');
            $table->foreign('product_id')->references('id')->on('products');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
