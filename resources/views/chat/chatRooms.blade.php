@extends('index')
@section('body')
@foreach ($chatroom as $room)		
		<div class="panel-heading">
    		<h3 class="panel-title">{{ $room->roomname }}</h3>
  		</div>
  		<a href="./chat/{{ $room->roomname }}/{{ $user }}">Go to room:{{ $room->roomname }} </a>
 		<br>
 		<br>
 		<br>		
	@endforeach
@endSection