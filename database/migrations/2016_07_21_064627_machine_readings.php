<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MachineReadings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('machine_readings', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('restaurant_id');
			$table->integer('machine_id');
			$table->float('temperature_reading');
			$table->dateTime('reading_date_time');
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
        Schema::drop('machine_readings');
    }
}
