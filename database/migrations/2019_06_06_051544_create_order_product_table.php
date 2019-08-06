<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('order_id')->unsigned()->nullable();
          $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('set null');
          $table->integer('product_pid')->unsigned()->nullable();
          $table->foreign('product_pid')->references('pid')->on('products')->onUpdate('cascade')->onDelete('set null');
          $table->integer('quan')->unsigned();
          //join - order and product
        });
    }

    
}
