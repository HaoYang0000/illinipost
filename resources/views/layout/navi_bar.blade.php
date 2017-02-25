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
      <a class="btn navbar-btn create-post-button" href="./check_post">Check posts</a>
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
   </div>
</nav>
<div style="height: 60px;"></div>
