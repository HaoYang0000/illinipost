@extends('index')
@section('body')
<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/post_page/post-page.css') }}">

<div id="post-page" >
    <form id="create_post_form" method="post" action="create_post">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="title">Title:</label>
          <input class="form-control" id="title" name="title">
        </div>
        <label for="content">Content:</label>
        <textarea class="form-control" rows="5" id="content" name="content"></textarea>
        <div id="FoodAcademic">
            <input type="radio" name="category" value="1"> Food
            <input type="radio" name="category" value="2"> Academic
            <input type="radio" name="category" value="3"> Q&A
        </div>
    </form>
     <button class="btn btn-default" onclick="checkpost()">Submit</button>
</div>

<script type="text/javascript">
    function checkpost() {
        var title = document.getElementById("title");
        var body = document.getElementById("content");
        if(title.value.length <= 0 || body.value.length <= 0){
            alert("The title or body cannot be empty!");
            return;
        }
        else{
            document.getElementById("create_post_form").submit();
            return;
        }
    }
</script>
@endSection