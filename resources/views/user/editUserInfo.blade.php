@extends('index')
@section('body')
<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/post_page/post-page.css') }}">
<div class = "edit">
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
        <input type="submit" value="update" style="width: 120px; height: 30px;background-color:#59ffa3;"/>
    </form>
</div>
                    
@endSection