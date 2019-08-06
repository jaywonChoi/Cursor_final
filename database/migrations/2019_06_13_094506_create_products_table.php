<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->Increments('pid');
          $table->string('pname');
          $table->string('ptitle');
          $table->string('ptext');
          $table->integer('price');
          $table->integer('quan');
          $table->string('main',500);
          $table->string('sub1',500);
          $table->string('sub2',500);
          $table->string('category');
          $table->timestamps();
        });
    }

    
}
