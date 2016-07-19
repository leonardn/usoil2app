<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateestaurantsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('restaurant_name');
            $table->string('restaurant_location_code');
            $table->string('restaurant_location');
            $table->string('restaurant_location_lati');
            $table->string('restaurant_location_long');
            $table->string('contact_person_title');
            $table->string('contact_person_first_name');
            $table->string('contact_person_last_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');
            $table->string('contact_person_phone_ext');
            $table->dateTime('activation_date');
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
        Schema::drop('restaurants');
    }
}
