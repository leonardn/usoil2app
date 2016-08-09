<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasinoRestaurantLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casino_restaurant_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('casino_id')->unsigned()->index();
            $table->integer('restaurant_id')->unsigned()->index();
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
        Schema::drop('casino_restaurant_links');
    }
}
