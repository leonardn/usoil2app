<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecasinosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casinos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('casino_trade_name');
            $table->string('casino_email');
            $table->string('casino_address1');
            $table->string('casino_address2');
            $table->string('casino_city');
            $table->string('casino_state');
            $table->string('casino_zipcode');
            $table->string('casino_phone');
            $table->string('casino_phone_ext');
            $table->string('casino_ein');
            $table->string('account_payable_name');
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
        Schema::drop('casinos');
    }
}
