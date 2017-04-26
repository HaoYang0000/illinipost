@extends('index')
@section('body')

  <link  rel='stylesheet' type='text/css'>
  <title>home</title> 
      <meta charset="utf-8"/>
      <title>flappy bird</title> 
      <style>

        .home_body1{
          opacity: 0.8;
          margin-top: 12%;
          height: 360px;
          background-color: black;
        }

        .home_body1 h1{
          opacity: 1;
          color: #ff8800;
        }
        .home_body2{
          opacity: 0.8;
          height: 550px;
          margin-top: -1%;
          background-color: white;
        }

        .home_body3{
          height: 550px;
          opacity: 0.8;
          background-color: #ff8800;
        }


        #game_div, h1, p{
            text-align: center;
            font-family: Lato;
            font-weight: bolder;
            width: 400px;
            margin: 0 auto;
            margin-top: 20px;
        }

        .point a{
        text-decoration:none;
        }

      </style>
   
        
 
  <script type="text/javascript" src="phaser.min.js"></script>
  <script type="text/javascript" src="fun.js"></script>

    <script type="text/javascript" src="jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="jquery.tagsphere.min.js"></script>
    <script type="text/javascript">
  $(function(){
      $('#ts1').tagcloud({centrex:225,centrey:225});
      $('#ts2').tagcloud({centrex:100,centrey:100,min_font_size:10,max_font_size:16,zoom:100});
  });
    </script>

<div class="home_body1">
    <br>
    <br>
    <br>
    <br>
    <h1>ILLINI POST</h1>
    <h1>Weclome to your NO.1 U of I service station.</h2>
</div>

<div class="home_body2">
  <div>
      <h6>&nbsp;</h6>
      <h1 style="margin-left: 50%; margin-top: 12%; font-size: 6em;">GO ILLINI!!!</h1>
      <div>
       <div id="game_head" style="margin-left: 48%;">
        <p style="font-size: 1.7em; margin-left: 5%; ">Press the spacebar to jump</p>
      </div>
      </div>

  </div>
  <div>
    <div id="game_div" style="margin-top: -27%;margin-left: 10%; height: 10%; width: 40%; "> </div>
  </div>
</div>

<div class="home_body3">
  <br>
  <br>
<div style="margin-left: 50%; margin-top: 0%;right: 10%;">
    <div id="ts1" style="width:450px; height:450px;background-color: #FFFFFF; opacity: 1;">
        <ul>
        @foreach( $wordarray as $word)
          <li><a href="search/{{ $word->word }}" rel="{{ $word->num }}">{{ $word->word }}</a></li>
        @endforeach
      
        </ul>
    </div>
    <h1 style="margin-left: -80%; margin-top: -40%;"> What is everyone talking about today?</h1>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


@endSection