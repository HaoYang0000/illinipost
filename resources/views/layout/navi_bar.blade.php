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
         <li class="nav-text-background"><a class="nav-text-one" href="/">HOME</a></li> 
         <li class="nav-text-background dropdown">
          <a class="dropdown-toggle nav-text-one" data-toggle="dropdown" href="#">Q&A
          <span class="caret"></span></a>
          <ul class="dropdown-menu" id="dropd-menu">
              <li class="nav-dropd-text-background"><a href="#">Page 1-1</a></li>
              <li class="nav-dropd-text-background"><a href="#">Page 1-2</a></li>
              <li class="nav-dropd-text-background"><a href="#">Page 1-3</a></li>
          </ul>
         </li>
         <li class="nav-text-background"><a class="nav-text-one" href="#">ACADEMIC</a></li>
         <li class="nav-text-background"><a class="nav-text-one" href="#">FOOD</a></li>
      </ul>
      <a class="btn navbar-btn create-post-button" href="./create_post">Make a post</a>
      <a class="btn navbar-btn create-post-button" href="./check_post">Check posts</a>\
      <!--Search bar-->
      <form class="navbar-form navbar-right">
        <div class="input-group">
          <input type="text" class="search-bar form-control" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Login bar-->
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
          <div class="register">
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <label name="age">Age</label>
                        <input type="age" name="age"/>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                   </fieldset>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
      @else
      <h2 type="text">Hello,{{ Auth::user()->firstName }}</h2>
      <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>                            
      @endif
      
   </div>
</nav>
<div style="height: 60px;"></div>


<!-- Move to public folder later -->
<script type="text/javascript">
  
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
</script>
