@extends('index')
@section('body')
<div style="background-color: rgba(255,0,255, 0.2); height: 1000px; ">
@foreach ($chatroom as $room)		
		<div class="panel-heading">
    		
  		</div> 
  		<br>
  		<br>
  		<br>
  		
  		<a href="./chat/{{ $room->roomname }}/{{ $user }}" style="font-weight: bold; font-size: 28px; color:#F0FFFF; margin-left: 400px; 
">Go to room:{{ $room->roomname }} and start your chat ٩(๑•̀ω•́๑)۶</a>

 		<br>
 		<br>
 		<br>
 		<img src="http://68.media.tumblr.com/7845ad46f0b321d7ff450acc0cee7563/tumblr_nhvilswST21t0t8uno1_500.gif" style="width:304px;height:200px; margin-left: 480px;">
 			
	@endforeach
</div>
@endSection
