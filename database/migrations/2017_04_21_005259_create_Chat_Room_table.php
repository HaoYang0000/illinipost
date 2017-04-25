<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats_room', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('room_id');
            $table->integer('owner_id')->nullable();
            $table->string('roomname');
            $table->string('username');
            $table->integer('capacity')->default(10);
            $table->integer('num_viewed')->default(0);
            $table->boolean('user_is_typing')->default(false);
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
        Schema::drop('chats_room');
    }
}
