<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('team1_pts');
            $table->integer('team2_pts');
            $table->unsignedBigInteger('referee_id');
            $table->unsignedBigInteger('performance_id');
            $table->foreign('referee_id')->references('id')->on('referees');
            $table->foreign('performance_id')->references('id')->on('team_performances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
