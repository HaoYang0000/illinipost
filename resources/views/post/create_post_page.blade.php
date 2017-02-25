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
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endSection