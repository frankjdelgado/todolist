<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title='asd'}}</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,300,300italic' rel='stylesheet' type='text/css'>

	<!-- CSS Files -->
	@section('css')
	    <!-- Bootstrap -->
	    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	    <!-- Main -->
    
    	<!-- Custom -->
    @show
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
	<!-- Custom Content -->
	@yield('content')

	<!-- JS Files -->
	@section('js')
		<!-- JQuery -->
	    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
	    <!-- Bootstrap -->
	    <script src="{{asset('js/bootstrap.min.js')}}"></script>
	    <!-- Main -->
    
    	<!-- Custom -->
    @show
  </body>
</html>