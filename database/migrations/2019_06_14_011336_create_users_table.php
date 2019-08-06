<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamps();
            $table->string('uid',50)->unique();
            $table->string('email');
            $table->string('password');
            $table->string('fullname');
            $table->string('phone');
            $table->string('sex');
            $table->rememberToken();

        });
    }


}
