<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->timestamp('date');
            $table->boolean('edited')->default(false);
            $table->boolean('deleted')->default(false);
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id', 'fk_messages_players')
            ->on('players')
            ->references('id')
            ->onDelete('cascade');
            $table->unsignedBigInteger('party_id');
            $table->foreign('party_id', 'fk_messages_parties')
            ->on('parties')
            ->references('id')
            ->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}
