<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersHaveSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playersHaveSponsors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('player_id');
            $table->integer('sponsor_id');
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('sponsor_id')->references('id')->on('sponsors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playersHaveSponsors');
    }
}
