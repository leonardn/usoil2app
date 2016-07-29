<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrashBinsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trash_bins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned()->index();
            $table->integer('log_option_id')->unsigned()->index();
            $table->float('trash_weight');
            $table->dateTime('creation_date');
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
        Schema::drop('trash_bins');
    }
}
