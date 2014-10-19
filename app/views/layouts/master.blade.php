<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title or '' }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,300,300italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @section('css')
    @show
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  @include('shared.header')

	<!-- Custom Content -->
	@yield('content')

  <div class="footer-separator"></div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-right">
          <ul class="list-inline list-unstyle">
            <li>
              <a target="_blank" href="https://github.com/frankjdelgado/todolist">
              <span>Check our project at</span>
              Github
              <span class="icon-uniE61A"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
	<!-- JS Files -->
  <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  @section('js')
  @show
  </body>
</html>