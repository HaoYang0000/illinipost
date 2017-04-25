<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table='chat_messages';

    protected $fillable = [
                          'room_id',
                           'sender_username',
                           'message',
                           'receiver_username',
                        
                           ];
}
