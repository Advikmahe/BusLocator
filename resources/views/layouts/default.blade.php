<!DOCTYPE html>
<html>
<head>
    <title>Add UserProfile</title>  
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	
	
</head>
<body>
   <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading"><span style="padding-left:50px;"> <a class="btn btn-primary" href="{{ route('Userprofile.index') }}"> Back</a><span style="padding-left:50px;"><a href="{{url('/logout')}}" class="btn btn-success">Logout</a></span></div>
	  
	  <div class="collapse navbar-collapse" id="app-navbar-collapse">
                

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            
                        </li>
                    @endif
                </ul>
            </div>
 

    @yield('content')
</div>
</div>
</div>
 
</body>
</html>