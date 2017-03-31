@extends('index')
@section('body')
<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/post_page/post-page.css') }}">

<div id="post-page" class="panel panel-default">
	@foreach ($posts as $post)
		<div class="panel-heading">
    		<h3 class="panel-title">{{ $post->title }}</h3>
  		</div>
		<div class="panel-body" style="overflow-y: auto;">{{ $post->content }}</div>
		<form id="delete_post_form" method="post" action="delete_post">
			{!! csrf_field() !!}
			<input id="post_id" name="post_id" hidden> 
        </form>
        <input type="button" name="delete" onclick="submit({{ $post->post_id }})" value="Delete"/>  
	@endforeach
  
</div>
<script type="text/javascript">
function submit(id){
	document.getElementById('post_id').value = id;
	document.getElementById('delete_post_form').submit();
}

</script>

@endSection