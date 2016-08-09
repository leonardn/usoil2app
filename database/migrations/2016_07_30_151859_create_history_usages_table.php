<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoryUsagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_usages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corporation_id')->unsigned()->index();
            $table->integer('casino_id')->unsigned()->index();
            $table->integer('restaurant_id')->unsigned()->index();
            $table->float('usage');
            $table->string('month');
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
        Schema::drop('history_usages');
    }
}
