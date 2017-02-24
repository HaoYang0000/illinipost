<nav id="nav-bar-element" class = "navbar-inverse" > 
   <div class="navbar-header">
   	  <button type = "button" class = "navbar-toggle" 
         data-toggle = "collapse" data-target = "#navbar-collapse">
         <span class = "sr-only">Toggle navigation</span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Illinipost</a>
    </div>
   <div class = "collapse navbar-collapse" id="navbar-collapse">
	
      <ul class = "nav navbar-nav">
         <li class="nav-text-background"><a class="nav-text-one" href="#">Home</a></li>	
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
   </div>
</nav>
<div style="height: 30px;"></div>

<!-- Change color while hoving -->
<style type="text/css">
nav#nav-bar-element{
	background-color: #003d66;
}
nav#nav-bar-element a.navbar-brand{
    color: #ff6600;
}
nav#nav-bar-element a.nav-text-one{
    color: white;
}
nav#nav-bar-element li.nav-text-background:hover{
    background-color: #ff6600;
}
nav#dropd-menu li.nav-dropd-text-background:hover{
    background-color: blue;
}
nav#nav-bar-element{
    position:fixed;
    width: 100%;
}
</style>