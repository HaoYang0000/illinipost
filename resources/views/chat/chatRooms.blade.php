@extends('index')
@section('body')
@foreach ($chatroom as $room)		
		<div class="panel-heading">
    		
  		</div>
  		<br>
  		<br>
  		<br>
  		<a href="./chat/{{ $room->roomname }}/{{ $user }}" style="font-weight: bold; font-size: 28px; color: purple; margin-left: 400px; ">Go to room:{{ $room->roomname }} and start your chat(｡◕∀◕｡)</a>
 		<br>
 		<br>
 		<br>
 		<img src="http://68.media.tumblr.com/7845ad46f0b321d7ff450acc0cee7563/tumblr_nhvilswST21t0t8uno1_500.gif" style="width:304px;height:200px; margin-left: 480px;">		
	@endforeach
@endSection