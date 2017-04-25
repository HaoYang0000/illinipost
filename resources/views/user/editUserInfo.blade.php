@extends('index')
@section('body')
<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/post_page/post-page.css') }}">
<<<<<<< HEAD
<<<<<<< HEAD
<div class = "edit">
    @if($path != null)
        <img src="{{$path}}" style="width:150px;height:150px;">
    @else
        <img src="/files/male.png" style="width:150px;height:150px;">
    @endif
    <br>
    <button data-toggle="modal" data-target="#uploadPicture">Upload Picture</button>
=======
=======
>>>>>>> origin/master
<div class = "edit" style="height:680px; margin-top: 0%; width: 350px;">
    @if($path != null)
        <img src="{{$path}}" style="width:150px;height:150px;margin-left: 100px;">
    @else
        <img src="/files/male.png" style="width:150px;height:150px;margin-left: 100px;">
    @endif
    <br>
    <button data-toggle="modal" data-target="#uploadPicture" style="margin-left: 125px;">Upload Picture</button>
<<<<<<< HEAD
>>>>>>> food
=======

>>>>>>> origin/master
    <form id="user_register" role="form" method="POST" action="editUserInfo">
        {{ csrf_field() }}
        <label name="firstname">First Name</label><br>
        <input type="firstname" name="firstName" value="{{ $user->firstName }}"/><br>
        <label name="lastName">Last Name</label><br>
        <input type="lastName" name="lastName" value="{{ $user->lastName }}"/> 
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label name="email" style="margin-top: 5%;">Email</label><br>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <label name="age">Age</label><br>
        <input type="age" name="age" value="{{ $user->age }}"/><br>
        <input name="user_id" hidden="true" value="{{ $user->id }}"><br>
        <input type="submit" value="update" style="width: 120px; height: 30px;background-color:white;"/>
    </form>
</div>

<!--  Pop up start -->
<div class="modal fade" id="uploadPicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload a new picture</h4>
              </div>
              <div class="modal-body">
                     <form action="upload_profile_picture" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        Profile photo:
                        <br />
                        <input type="file" name="image" multiple />
                        <br />
                        <input type="submit" value="Upload" />
                    </form>
              </div>
            </div>
        </div>
    </div>
</div>
<!--  Pop up end -->
                    
@endSection