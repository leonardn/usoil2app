<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatefryersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fryers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fryer_name');
            $table->string('make');
            $table->string('model');
            $table->string('serial_number');
            $table->float('oil_capacity');
            $table->float('benchmark');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fryers');
    }
}
