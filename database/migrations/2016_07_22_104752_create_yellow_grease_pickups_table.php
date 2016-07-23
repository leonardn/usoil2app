<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYellowGreasePickupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yellow_grease_pickups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporation_id')->unsigned()->index();
            $table->integer('casino_id')->unsigned()->index();
            $table->float('grease');
            $table->date('pickup_date');
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
        Schema::drop('yellow_grease_pickups');
    }
}
