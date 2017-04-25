<!-- CSS file -->
<!-- Under directory illinipost\public\css -->
<link rel="stylesheet" href="{{ URL::asset('/css/navigation_bar/nav-bar-element.css') }}">

<nav id="nav-bar-element" class = "navbar-inverse" > 
   <div class="navbar-header">
      <button type = "button" class = "navbar-toggle" 
         data-toggle = "collapse" data-target = "#navbar-collapse">
         <span class = "sr-only">Toggle navigation</span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">IlliniPost</a>
    </div>
   <div class = "collapse navbar-collapse" id="navbar-collapse">
  
      <ul class = "nav navbar-nav">
         <li class="nav-text-background"><a class="nav-text-one" href="/home">HOME</a></li> 
         <li class="nav-text-background dropdown">
          <a class="dropdown-toggle nav-text-one" data-toggle="dropdown" href="#">Q&A
          <span class="caret"></span></a>
          <ul class="dropdown-menu" id="dropd-menu">
              <li class="nav-dropd-text-background"><a href="#">Page 1-1</a></li>
              <li class="nav-dropd-text-background"><a href="#">Page 1-2</a></li>
              <li class="nav-dropd-text-background"><a href="#">Page 1-3</a></li>
          </ul>
         </li>
         <li class="nav-text-background"><a class="nav-text-one" href="/check_post_a">ACADEMIC</a></li>
         <li class="nav-text-background"><a class="nav-text-one" href="/check_post_f">FOOD</a></li>
      </ul>
      <a class="btn navbar-btn create-post-button" href="/create_post">Make a post</a>
      <a class="btn navbar-btn create-post-button" href="/check_post">Check posts</a>
      <a class="btn navbar-btn create-post-button" href="/chatRooms">Chat Room</a>

      <!--Search bar-->
      <form class="navbar-form navbar-right" role="form" method="POST" action="search" >
        {!! csrf_field() !!}
        <div class="input-group search-panel">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span id="search_concept">All</span> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
              <li><a href="#title">Title</a></li>
              <li><a href="#content">Content</a></li>
              <li><a href="#author">Author</a></li>
              <li class="divider"></li>
              <li><a href="#all">All</a></li>
          </ul>
          
          <input type="hidden" name="search_param" value="all" id="search_param">  
          <input type="text" class="search-bar form-control" name="content">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Login bar-->
      <!-- Not login-->
      @if (Auth::guest())
      <div id="wrap">
        <div id="regbar">
          <div id="navthing">
              <h5><a  href="#" id="loginform">Login</a>&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp<a href="#" id="registerform">Register</a> </h5>
          <div class="login">
              <div class="arrow-up"></div>
              <div class="formholder">
                <div class="randompad">
                   <fieldset>
                     <form id="user_login" role="form" method="POST" action="{{ route('login') }}">
                     {!! csrf_field() !!}
                     <label name="email">Email</label>
                     <input type="email" name="email" value="" />
                     <label name="password">Password</label>
                     <input type="password" name="password"/>
                     <input type="submit" value="Login" />
                    </form>
                   </fieldset>
                </div>
              </div>
              </div>
          <div class="register" style="overflow-y: scroll; height: 400px;">
              <div class="arrow-up_2"></div>
              <div class="formholder">
                <div class="randompad">
                   <fieldset>
                     <!-- <form id="user_register" role="form" method="POST" action="{{ route('register') }}">
                     {{ csrf_field() }}
                     
                            <label name="firstname">First Name</label> 
                                <input type="firstname" name="firstName"/>
                                <label name="lastName">Last Name</label> 
                               <input type="lastName" name="lastName"/> 
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label name="email">Email</label> 
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                     
                     
                     
                     
                     <label name="password">Password</label>
                     <input type="password" name="password"/>
                      <label name="age">Age</label>
                     <input type="age" name="age"/>
                     <input type="radio" name="gender" value="0"> Male
                    <input type="radio" name="gender" value="1"> Female<br>
                     <br>
                     <input type="submit" value="Sign Up" />
                    </form> -->
                    <form  id = "user_register" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" hidden>
                            <label for="name">Name</label>
                            <input id="name" type="firstname"  name="name" value="test" required autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <label for="firstName">firstName</label>
                            <input id="firstName" type="firstName"  name="firstName" value="{{ old('firstName') }}" required autofocus>

                            @if ($errors->has('firstName'))
                            <span class="help-block">
                            <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <label for="lastName">lastName</label>
                            <input id="lastName" type="lastName"  name="lastName" value="{{ old('lastName') }}" required autofocus>

                            @if ($errors->has('lastName'))
                            <span class="help-block">
                            <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                                <input id="password" type="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <label name="age">Age</label>
                        <input type="age" name="age"/>

                        <input type="radio" name="gender" value="1"> Male
                        <input type="radio" name="gender" value="2"> Female<br>
                        <br>
                        <input type="submit" value="Sign Up" />
                    </form>
                   </fieldset>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
      @else
      <!-- logged in-->
      <div class="profile">
        <div class="profilesub1">
          &nbsp&nbsp
        </div>
        <div class="profilesub2">
            <a >|&nbsp&nbspGreeting,&nbsp{{ Auth::user()->firstName }}</a>
            <button style="padding: 0; border: none; background: none;"onclick="editUserInfo({{ Auth::user()->id }})">&nbsp&nbsp|&nbsp&nbspEDIT&nbsp&nbsp|&nbsp&nbsp</button>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">LOGOUT&nbsp&nbsp|</a>
        </div>
        <form id="edit_user_info" action="editUserInfo" method="GET">
            <input id="user_id" name="user_id" hidden="true">
        </form>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>                            
      </div>
      @endif
   </div>
</nav>
<div style="height: 60px;"></div>


<!-- Move to public folder later -->
<script type="text/javascript">
function editUserInfo(id){
  document.getElementById('user_id').value = id;
  document.getElementById('edit_user_info').submit();
}
  
  $('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#2ecc71');
  });
  $('input[type="submit"]').mouseup(function(){
    $(this).css('background', '#1abc9c');
  });

  $('#loginform').click(function(){
    $('.login').fadeToggle('slow');
    $(this).toggleClass('green');
  });

  $('#registerform').click(function(){
    $('.register').fadeToggle('slow');
    $(this).toggleClass('green');
  });


$(document).mouseup(function (e)
{
    var container = $(".login");
    var container2 = $(".register");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('#loginform').removeClass('green');
    }

    if (!container2.is(e.target) // if the target of the click isn't the container...
        && container2.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container2.hide();
        $('#registerform').removeClass('green');
    }
});

$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
      e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.input-group #search_param').val(param);
  });
});


</script>
