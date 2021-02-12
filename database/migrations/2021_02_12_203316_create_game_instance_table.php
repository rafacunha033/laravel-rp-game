<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameInstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_instance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('game_user_id');
            $table->unsignedBigInteger('country_id');
            $table->timestamps();
            
            $table->foreign('game_user_id')->references('id')->on('game_user');     
            $table->foreign('country_id')->references('id')->on('countries');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_instance');
    }
}
