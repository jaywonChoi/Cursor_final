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
            $table->increments('id');
            $table->timestamps();
            $table->string('uid');
            $table->string('tax');
            $table->string('subtotal');
            $table->integer('total');
            $table->string('fullname');
            $table->string('email');
            $table->string('zip');//zipcode
            $table->string('address_do');//first address_do
            $table->string('address_si'); //second address_si
            $table->string('address_city'); //third address_city
            $table->string('phone');
            $table->string('card_name');
            $table->string('payment_id');

        });
    }
  

}
