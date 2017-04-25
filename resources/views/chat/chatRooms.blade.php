@extends('index')
@section('body')

<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/chats.css') }}">
<div class="chatroom">
	<div>
		<button type="button" id="create-chat-button" data-toggle="modal" data-target="#myModal">
			Create new chat room</button>
		<label>Quick Search: <input id="search" type="text"></label>
	</div>
	<table class="table table-hover" id="chat-table">
		<thead>
	      <tr class="active">
	        <th>Room number</th>
	        <th>Room name</th>
	        <th>Created by</th>
	        <th>Number of Viewed</th>
	        <th>Number of active user</th>
	        <th>Action</th>
	      </tr>
	    </thead>
		<tbody>
	      
	      	@foreach ($chatroom as $room)
	      	<tr>
	      		<td>{{ $room->room_id }}</td>
	      		<td>{{ $room->roomname }}</td>
	      		<td>{{ $room->getOwner($room->owner_id) }}</td>	
	      		<th>{{ $room->num_viewed }}</th>
	      		<th>{{ $room->getActiveUserNum($room->roomname) }}</th>
	      		<td>
	      			<a href="./chat/{{ $room->roomname }}/{{ $user->firstName }}" style="color:black;">Enter Room</a>
	      			@if($room->belongTo($user->id))
	      			/
	      			<a href="#" id="edit-chat-room" data-toggle="modal" data-target="#editRoom" style="color:green;" onclick="edit_room('{{ $room->id}}','{{$room->roomname}}' ,'{{ $room->capacity}}')">Edit Room</a>
	      			/
	      			<a href="#" onclick="delete_room({{ $room->id }})" style="color:red;">Delete Room</a>
	      			@endif
	      		</td>	
	      	</tr>
		 	@endforeach
	      
	    </tbody>
	</table>
  <img src="http://68.media.tumblr.com/7845ad46f0b321d7ff450acc0cee7563/tumblr_nhvilswST21t0t8uno1_500.gif" style="width:304px;height:200px; margin-left: 480px;">
 		
<!--  Pop up start -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create a new room</h4>
		      </div>
		      <div class="modal-body">
		      		<form id="create_chat_room" method="post" action="create_chat_room">
				        {!! csrf_field() !!}
				        <div class="form-group">
				          <label for="title">Room Name:</label>
				          <input class="form-control" id="room_name" name="room_name">
				        </div>
				        <div class="form-group">
				          <label for="title">Capacity</label>
				          <input class="form-control" id="room_capacity" name="room_capacity">
				        </div>
				       <!--  <label for="content">Content:</label>
				        <textarea class="form-control" rows="5" id="content" name="content"></textarea> - -->
				    	<button class="btn btn-default" onclick="checkpost()">Submit</button>
				    </form>
		      </div>
		    </div>
		</div>
	</div>
</div>
<!--  Pop up end -->

<!--  Pop up start -->
<div class="modal fade" id="editRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Room</h4>
		      </div>
		      <div class="modal-body">
		      		<form id="edit_chat_room" method="post" action="edit_chat_room">
				        {!! csrf_field() !!}
				        <div class="form-group">
				          <label for="title">Room Name:</label>
				          <input class="form-control" id="edit_room_name" name="edit_room_name">
				        </div>
				        <div class="form-group">
				          <label for="title">Capacity</label>
				          <input class="form-control" id="edit_room_capacity" name="edit_room_capacity">
				        </div>
				        <input id="edit_room_id" name="edit_room_id" hidden> 
				       <!--  <label for="content">Content:</label>
				        <textarea class="form-control" rows="5" id="content" name="content"></textarea> - -->
				    	<button class="btn btn-default" onclick="checkpost()">Submit</button>
				    </form>
		      </div>
		    </div>
		</div>
	</div>
</div>
<!--  Pop up end -->
	
		      <!-- <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div> 
		    </div>
		  </div>
		</div>
	</div> -->

<form id="delete_room_form" method="post" action="delete_room">
	{!! csrf_field() !!}
	<input id="room_id" name="room_id" hidden> 
</form>
<script type="text/javascript">
	function delete_room(id){
		document.getElementById('room_id').value = id;
		document.getElementById('delete_room_form').submit();
	}

	function edit_room(id,roomname,capacity){
		document.getElementById('edit_room_id').value = id;
		document.getElementById('edit_room_name').value = roomname;
		document.getElementById('edit_room_capacity').value = capacity;
		// document.getElementById('edit_chat_room').submit();
	}

	var $cells = $("td");

	$("#search").keyup(function() {
	    var val = $.trim(this.value).toUpperCase();
	    if (val === "")
	        $cells.parent().show();
	    else {
	        $cells.parent().hide();
	        $cells.filter(function() {
	            return -1 != $(this).text().toUpperCase().indexOf(val); }).parent().show();
	    }
	});
</script>

	<!-- <div id="chat-page" >
		
		<div id="upper-box">
			<label >Available chat rooms:</label>
		</div>
		</button>
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
	 	@endforeach

	 		<img src="http://68.media.tumblr.com/7845ad46f0b321d7ff450acc0cee7563/tumblr_nhvilswST21t0t8uno1_500.gif" style="width:304px;height:200px; margin-left: 480px;">		
	 -->	
		

		
	
	     




@endSection
