<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFryerTMPSsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fryer_t_m_p_ss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fryer_id')->unsigned()->index();
            $table->float('measured_tpm');
            $table->float('oil_temp');
            $table->tinyInteger('changed_oil');
            $table->integer('quantity_added');
            $table->tinyInteger('oil_moved');
            $table->float('amount_moved');
            $table->integer('moved_to_fryer_id')->unsigned()->index();
            $table->date('creation_date');
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
        Schema::drop('fryer_t_m_p_ss');
    }
}
