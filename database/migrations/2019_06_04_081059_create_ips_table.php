<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_ps', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('report_date');
            $table->string('PV_num');
            $table->string('UU_num');
            $table->string('CVR_num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('ips');
    // }
}
