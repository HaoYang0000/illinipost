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
      <a class="navbar-brand" href="/">Illinipost</a>
    </div>
   <div class = "collapse navbar-collapse" id="navbar-collapse">
	
      <ul class = "nav navbar-nav">
         <li class="nav-text-background"><a class="nav-text-one" href="/">Home</a></li>	
         <li class="nav-text-background dropdown">
        	<a class="dropdown-toggle nav-text-one" data-toggle="dropdown" href="#">Q&A
        	<span class="caret"></span></a>
        	<ul class="dropdown-menu" id="dropd-menu">
          		<li class="nav-dropd-text-background"><a href="#">Page 1-1</a></li>
          		<li class="nav-dropd-text-background"><a href="#">Page 1-2</a></li>
          		<li class="nav-dropd-text-background"><a href="#">Page 1-3</a></li>
        	</ul>
      	 </li>
      	 <li class="nav-text-background"><a class="nav-text-one" href="#">Acedamic</a></li>
      	 <li class="nav-text-background"><a class="nav-text-one" href="#">Food</a></li>
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
      <div id="wrap">
        <div id="regbar">
          <div id="navthing">
            <h2><a href="#" id="loginform">Login</a> | <a href="#" id="registerform">Register</a></h2>
          <div class="login">
              <div class="arrow-up"></div>
              <div class="formholder">
                <div class="randompad">
                   <fieldset>
                     <form id="user_login" method="post" action="user_login">
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
                     <form id="user_register" method="post" action="user_register">
                     {!! csrf_field() !!}
                     <label name="firstname">First Name</label> 
                     <input type="firstname" name="firstName"/>
                     <label name="lastName">Last Name</label> 
                     <input type="lastName" name="lastName"/> 
                     <label name="email">Email</label> 
                     <input type="email" name="email" value="" />
                     <label name="password">Password</label>
                     <input type="password" name="password"/>
                      <label name="age">Age</label>
                     <input type="age" name="age"/>
                      
                     <input type="radio" name="gender" value="0"> Male
                    <input type="radio" name="gender" value="1"> Female<br>
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
