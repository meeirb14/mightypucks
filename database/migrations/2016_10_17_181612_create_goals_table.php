<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('goals', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->integer('game_id')->unsigned();
            $table->string('team');
            $table->string('time');
            //$table->string('scorer');
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('games');
    }
}
