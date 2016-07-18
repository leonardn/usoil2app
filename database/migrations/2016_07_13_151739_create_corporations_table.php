<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecorporationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('corporation_name');
            $table->string('corporation_address1');
            $table->string('corporation_address2');
            $table->string('corporation_city');
            $table->string('corporation_state');
            $table->string('corporation_zipcode');
            $table->string('corporation_phone');
            $table->string('corporation_phone_ext');
            $table->string('contact_person_title');
            $table->string('contact_person_first_name');
            $table->string('contact_person_last_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');
            $table->string('contact_person_phone_ext');
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
        Schema::drop('corporations');
    }
}
