<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ChatRoom;
use App\ChatMessage;
use DB;

class ChatController extends Controller
{
    public function check_chat_page(Request $request){
        $chatroom = ChatRoom::all();
        $user = $request->user();
        if($user == null){
            $user = 'Doe Joe';
        }

        return view('chat.chatRooms',compact('chatroom','user'));
    }

    public function sendMessage(Request $request)
    {
        $username = $request->input('username');
        $roomname = $request->input('roomname');
        $text = $request->input('text');

        $room = ChatRoom::where('username', '=', $username,'and', 'roomname', '=', $roomname)->first();
        
        ChatMessage::create([
            'room_id' => $room->id,
            'sender_username'=> $username,
            'message'=> $text,
        ]);
        // $chatMessage = new ChatMessage();
        // $chatMessage->room_id = $room->id;
        // $chatMessage->sender_username = $username;
        // $chatMessage->message = $text;
        // $chatMessage->save();
    }

    public function isTyping(Request $request)
    {
        
        $username = $request->input('username');
        $roomname = $request->input('roomname');

        $room = ChatRoom::where('username', '=', $username,'and', 'roomname', '=', $roomname)->first();
        $room->user_is_typing = 1;
        $room->save();
    }

    public function notTyping(Request $request)
    {
        $username = $request->input('username');
        $roomname = $request->input('roomname');

        $room = ChatRoom::where('username', '=', $username,'and', 'roomname', '=', $roomname)->first();
        $room->user_is_typing = 1;
        $room->save();
    }

    public function retrieveChatMessages(Request $request)
    {
        $username = $request->input('username');
        $roomname = $request->input('roomname');

        $room = ChatRoom::where('username', '=', $username,'and', 'roomname', '=', $roomname)->first();
        
        $message = ChatMessage::where('sender_username', '!=', $username,'and', 'roomname', '=', $roomname)->where('read', '=', false)->first();


        if (count($message) > 0)
        {
            $message->read = true;
            $message->save();
            $response = array(
            'status' => 'success',
            'message' => $message,
            );
            return $response;
        }
    }

    public function retrieveTypingStatus(Request $request)
    {
        $username = $request->input('username');
        $roomname = $request->input('roomname');

        $room = ChatRoom::where('username', '!=', $username,'and', 'roomname', '=', $roomname, 'and', 'user_is_typing', 'true')->first();
        

        if (count($room) > 0)
        {
            $response = array(
            'status' => 'success',
            'user' => 'Somebody',
            );

            return $response;
        }
        else
        {
            $response = array(
            'status' => 'success',
            'user' => 'Nomebody',
            );

            return $response;
        }
    }
}
