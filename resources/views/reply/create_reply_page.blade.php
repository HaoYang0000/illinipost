@extends('index')
@section('body')
<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/post_page/post-page.css') }}">

<div id="post-page" >
    <form id="create_post_form" method="post" action="reply_post">
        {!! csrf_field() !!}
        <label for="content">Content:</label>
        <input id="post_id" name="post_id" value = "{{$post_id}}" hidden> 
        <textarea class="form-control" rows="5" id="content" name="content"></textarea>
    </form>

     <button class="btn btn-default" onclick="checkpost()">Submit</button>
      <img src ="https://m.popkey.co/cee9a2/er35g_s-200x150.gif" style="margin-left: 1000px; ">
</div>

<script type="text/javascript">
    function checkpost() {
        var body = document.getElementById("content");
        var postid = document.getElementById("a");
        if(body.value.length <= 0){
            alert("The body cannot be empty!");
            return;
        }
        else{
            document.getElementById("create_post_form").submit();
            return;
        }
    }
</script>
@endSection