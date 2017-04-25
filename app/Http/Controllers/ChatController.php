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
        
        $user = $request->user();
        if($user == null){
            return view('layout.login_reminder');
        }else{
            
            $chatroom = ChatRoom::where('owner_id','!=',null)->get();
            return view('chat.chatRooms',compact('chatroom','user'));
        }
    }

    public function enter_room(Request $request,$roomname,$username)
    {
        $user = $request->user();
        if($user == null){
            return view('layout.login_reminder');
        }else{
            $room = ChatRoom::where('roomname','=',$roomname)->first();
            ChatRoom::create([
                'room_id' => $room->room_id,
                'roomname' => $roomname,
                'username' => $user->firstName,
            ]);
            $username = $user->firstName;


            return view('chat.chat',compact('roomname','username'));
        }
    }

    public function sendMessage(Request $request)
    {
        $username = $request->input('username');
        $roomname = $request->input('roomname');
        $text = $request->input('text');

        $room = ChatRoom::where('username', '=', $username,'and', 'roomname', '=', $roomname)->first();
        
        ChatMessage::create([
            'room_id' => $room->room_id,
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

    public function createNewRoom(Request $request){
        $user = $request->user();
        if($user == null){
            return view('layout.login_reminder');
        }else{
            ChatRoom::create([
                'room_id' => rand(),
                'owner_id'=> $user->id,
                'roomname' => $request->input('room_name'),
                'username' => $user->firstName,
            ]);

            $chatroom = ChatRoom::where('owner_id','!=',null)->get();

            return view('chat.chatRooms',compact('chatroom','user'));

        }
        

    }

    public function delete_room(Request $request){
        ChatRoom::where('id', '=', $request['room_id'])->delete();
        return redirect('/chatRooms');
    }
}
