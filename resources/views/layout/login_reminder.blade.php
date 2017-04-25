@extends('index')
@section('body')
<link rel="stylesheet" href="{{ URL::asset('/css/navigation_bar/nav-bar-element.css') }}">


<div id="catImg">
<img src="http://www.gifimagesdownload.com/wp-content/uploads/2016/02/11-cute-gif-222.gif">
</div>

<div id="Reminder"> 
Hi sweety, you still have <br>
 <div style="color:	#800080;">not logged in (❁´ω`❁)</div>
<div style="color: #FF0000;">Please log in ε٩(๑> ₃ <)۶з 
</div>
<br>
<div id ="NB" style="font-size:30px; color:#FFC0CB;"> Tip: click the login button to log in (⁎⁍̴̛ᴗ⁍̴̛⁎) </div>
</div>



@endSection