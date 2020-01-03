<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('pts');
            $table->integer('reb');
            $table->integer('ast');
            $table->integer('blocks');
            $table->integer('tos');
            $table->integer('fga');
            $table->integer('fgm');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_performances');
    }
}
