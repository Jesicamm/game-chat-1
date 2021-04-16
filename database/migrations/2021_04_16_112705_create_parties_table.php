<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table ->string('name');
           
            $table->unsignedBigInteger('game_id')->nullable();                
            $table->foreign('game_id', 'fk_party_games')
            ->on('games')
            ->references('id')
            ->onDelete('set null');

            $table->unsignedBigInteger('owner_id');                
            $table->foreign('owner_id', 'fk_party_players')
            ->on('players')
            ->references('id')
            ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties');
    }
}
