<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <title>{{ $title or '' }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">
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
    <div id="container">
      @include('shared.header')
      @include('shared.messages')	
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
    </div>

    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bower_components/jquery-ujs/src/rails.js')}}"></script>   
    @section('js')
    @show
  </body>
</html>