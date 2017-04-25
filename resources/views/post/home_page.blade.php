@extends('index')
@section('body')

  <link  rel='stylesheet' type='text/css'>
  <title>home</title>
  
      <meta charset="utf-8" />
      <title>flappy bird</title> 
      <style>
      #game_div, h1, p{
          text-align: center;
          font-family: Lato;
          font-weight: bolder;
          width: 400px;
          margin: 0 auto;
          margin-top: 20px;
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

<style type="text/css">
  .point a{
      text-decoration:none;
  }
</style>
<div style="position: absolute; top: 25%; right: 10%;">
  <div id="ts1" style="width:450px; height:450px; background-color: rgb(0,0,0); opacity: 0.7;">
      <ul>
    <li><a href="#" rel="20">Link 1</a></li>
    <li><a href="#" rel="15">Link 2</a></li>
    <li><a href="#" rel="10">Link 3</a></li>
    <li><a href="#" rel="5">Link 4</a></li>
    <li><a href="#" rel="1">Link 5</a></li>
    <li><a href="#" rel="5">Link 6</a></li>
    <li><a href="#" rel="10">Link 7</a></li>
    <li><a href="#" rel="15">Link 8</a></li>
    <li><a href="#" rel="20">Link 9</a></li>
    <li><a href="#" rel="15">Link 10</a></li>
    <li><a href="#" rel="10">Link 11</a></li>
    <li><a href="#" rel="5">Link 12</a></li>
    <li><a href="#" rel="1">Link 13</a></li>
    <li><a href="#" rel="5">Link 14</a></li>
    <li><a href="#" rel="10">Link 15</a></li>
      </ul>
  </div>
</div>
<div>
    <h6>&nbsp;</h6>
    
    <h1 style="margin-left: 5%;">GO ILLINI!!!</h1>
    <div>
     <div id="game_head">
    <p style="font-size: 1.3em; margin-left: 5%; ">Press the spacebar to jump</p>
    </div>
    </div>

</div>
<div>
  <div id="game_div" style="margin-left: 10%; height: 10%; width: 40%; "> </div>
  
</div>


@endSection