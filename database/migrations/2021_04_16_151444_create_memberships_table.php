<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('player_id');                
            $table->foreign('player_id', 'fk_membership_players')
            ->on('players')
            ->references('id')
            ->onDelete('restrict');

            $table->unsignedBigInteger('party_id');                
            $table->foreign('party_id', 'fk_membership_parties')
            ->on('parties')
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
        Schema::dropIfExists('memberships');
    }
}
