@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{asset('css/home.min.css')}}">
@stop
@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-6">
      <div class="invitation">
        <h2>Write it down</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam molestias reprehenderit error ipsum vero. Obcaecati magnam illum quis porro similique eum expedita, voluptates hic cupiditate harum, sed est, ex alias!</p>
        <div class="text-right">
          <a href="{{route('users.create', $params = null)}}" class="btn btn-lg btn-todo-red text-uppercase">sign me up!</a>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6 text-center">
      <img class="img-responsive" src="{{asset('img/checklist.png')}}" alt="">
    </div>
  </div>
</div>
@stop
