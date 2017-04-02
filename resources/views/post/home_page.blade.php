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


<div>
    <h6>&nbsp;</h6>
    <h1>GO ILLINI!!!</h1>
    <p style="font-size: 1.3em;">Press the spacebar to jump</p>
</div>
<div id="game_div" style="margin-left: 39%;"> </div>

@endSection