<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ChatRoom;


class ChatRoom extends Model
{
    protected $table='chats_room';

    protected $fillable = [
                          'room_id',
                          'owner_id',
                          'roomname',
                           'username',
                    
                           ];

    public function getOwner($id)
    {
        $user = User::find($id);
        return $user->firstName." ".$user->lastName;
    }

    public function belongTo($id)
    {
        $user = User::find($id);
        if($this->owner_id == $id){
        	return true;
        }
        else{
        	return false;
        }
        return false;
    }


}
