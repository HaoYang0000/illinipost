@extends('index')
@section('body')
<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/post_page/post-page.css') }}">

<div id="post-page" class="panel panel-default">
		<br>
 		<h1 style="font-family: cursive; font-weight: bold;color: #ff8000;"> Greetings from League of Legends</h1>
 		<br>
 		<br>

	<form  method="get" action="check_post_page">
		{!! csrf_field() !!}
		<select id="filter" name="filter">
		@if ($filter_type == "1") 
		<option value="1"  selected>food</option>
		@else 
		<option value="1">food</option>
		@endif 
		@if ($filter_type == "2") 

		<option value="2" selected>academic</option>
		@else 
		<option value="2">academic</option>
		@endif
		@if ($filter_type == "3") 

		<option value="3" selected="3">Q&A</option>
		@else 
		<option value="3">Q&A</option>
		@endif
		</select>
		<input type="submit" value="Submit" />
	</form>


	@foreach ($posts as $post)		
		<div class="panel-heading">
    		<h3 class="panel-title">{{ $post->title }}</h3>
  		</div>
		<div class="panel-body" style="overflow-y: auto;">{{ $post->content }}</div>
		<div class="panel-body" style="overflow-y: auto;">{{ $post->category }}</div>
		<div class="panel-body" style="overflow-y: auto;">{{ $post->user_first_name }} {{ $post->user_last_name }}</div>
		<div class="panel-body" style="overflow-y: auto;">Created Time: {{ $post->created_at }} &nbsp&nbsp Update Time:{{$post->updated_at}}</div>
	  	<input type="button" name="delete" onclick="submit({{ $post->id }})" value="Delete"/> 
		<form id="delete_post_form" method="post" action="delete_post">
			{!! csrf_field() !!}
			<input id="post_id" name="post_id" hidden> 
        </form>
         
 		<br>
 		<br>
 		<br>		
	@endforeach
	<br> 
	<br> 
	<br>
	<br>
	
</div>
<script type="text/javascript">
function submit(id){
	document.getElementById('post_id').value = id;
	document.getElementById('delete_post_form').submit();
}


</script>

@endSection