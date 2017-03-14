@extends('index')
@section('body')
<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/post_page/post-page.css') }}">
<div style="height: 200px;"></div>
 <form id="user_register" role="form" method="POST" action="editUserInfo">
                     {{ csrf_field() }}
                     
                            <label name="firstname">First Name</label> 
                                <input type="firstname" name="firstName" value="{{ $user->firstName }}"/>
                                <label name="lastName">Last Name</label> 
                               <input type="lastName" name="lastName" value="{{ $user->lastName }}"/> 
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label name="email">Email</label> 
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>   
                     <label name="age">Age</label>
                     <input type="age" name="age" value="{{ $user->age }}"/>
                     <input id="user_id" name="user_id" hidden="true" value="{{ $user->id }}">
                     <input type="submit" value="update"/>
</form>
                    
@endSection