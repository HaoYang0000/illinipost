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

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
<div style="margin-left: 50%; margin-top: 5%;right: 10%;">
    <div id="ts1" style="width:450px; height:450px;background-color: #FFFFFF; opacity: 1;">
        <ul>
      <li><a href="#" rel="50">{{ $wordarray[0]->word }}</a></li>
      <li><a href="#" rel="40">{{ $wordarray[1]->word }}</a></li>
      <li><a href="#" rel="35">{{ $wordarray[2]->word }}</a></li>
      <li><a href="#" rel="30">{{ $wordarray[3]->word }}</a></li>
      <li><a href="#" rel="25">{{ $wordarray[4]->word }}</a></li>
      <li><a href="#" rel="16">{{ $wordarray[5]->word }}</a></li>
      <li><a href="#" rel="15">{{ $wordarray[6]->word }}</a></li>
      <li><a href="#" rel="14">{{ $wordarray[7]->word }}</a></li>
      <li><a href="#" rel="13">{{ $wordarray[8]->word }}</a></li>
      <li><a href="#" rel="12">{{ $wordarray[9]->word }}</a></li>
      <li><a href="#" rel="11">{{ $wordarray[10]->word }}</a></li>
      <li><a href="#" rel="11">{{ $wordarray[11]->word }}</a></li>
      <li><a href="#" rel="11">{{ $wordarray[12]->word }}/a></li>
      <li><a href="#" rel="11">{{ $wordarray[13]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[14]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[15]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[16]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[17]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[18]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[19]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[20]->word }}</a></li>
      <li><a href="#" rel="10">{{ $wordarray[21]->word }}</a></li>
      <li><a href="#" rel="8">{{ $wordarray[22]->word }}</a></li>
      <li><a href="#" rel="7">{{ $wordarray[23]->word }}</a></li>
      <li><a href="#" rel="6">{{ $wordarray[24]->word }}</a></li>
      <li><a href="#" rel="5">{{ $wordarray[25]->word }}</a></li>
        </ul>
    </div>
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