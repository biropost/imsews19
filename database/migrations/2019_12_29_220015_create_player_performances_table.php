<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('pts');
            $table->integer('reb');
            $table->integer('ast');
            $table->integer('blocks');
            $table->integer('tos');
            $table->integer('fga');
            $table->integer('fgm');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_performances');
    }
}
