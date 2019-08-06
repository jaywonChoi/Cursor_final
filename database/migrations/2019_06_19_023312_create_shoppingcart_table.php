<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('cart.database.table'), function (Blueprint $table) {
            $table->string('identifier');
            $table->string('instance');
            $table->string('content');
            $table->nullableTimestamps();

            $table->primary(['identifier', 'instance']);
        });
    }
    
}
