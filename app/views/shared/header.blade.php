<nav class="navbar navbar-todo" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="icon-list navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      </button>
      {{link_to('/','todo',array('class'=>'navbar-brand text-uppercase'))}}
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Helpers::currentUser() }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="{{url('session/logout')}}">logout</a></li>
            </ul>
          </li>
        @else
          <li><a href="{{url('session/login', $parameters = array(), $secure = null)}}" class="text-uppercase">sign in</a></li>
          <li>
            {{ link_to_action('UsersController@getCreate','sign up', $parameters = array(), $attributes = array('class'=>'text-uppercase')) }}
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>