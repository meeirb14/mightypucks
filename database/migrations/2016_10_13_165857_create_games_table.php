<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('games', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->string('youtubeLink');
            $table->date('date');
            $table->string('vsTeam');
            $table->string('winLoss');
            $table->string('goalsFor');
            $table->string('goalsAgainst');
            $table->integer('season_id')->unsigned();
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons');

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
