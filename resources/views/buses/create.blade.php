<!DOCTYPE html>
<html>
<head>
    <title>Register a bus</title>  
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
</head>
<body>
   <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Register a bus<span style="padding-left:50px;"><a href="{{url('/logout')}}" class="btn btn-success">Logout</a></span></div>
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
    {!! Form::open(['url' => 'buses']) !!}
	 @if(Session::has('errors'))
            <div class="alert alert-warning">
                @foreach(Session::get('errors')->all() as $error_message)
                    <p>{{ $error_message }}</p>
                @endforeach
            </div>
        @endif
	@if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
	<div class="form-group">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! Form::label('Bus no', 'Bus no:') !!}
        {!! Form::text('Busno',null,array('class'=>'form-control','style'=>'width:350px;')) !!}
    </div>
	<div class="form-group">
                <label for="title">Select Bus Stop:</label>
                {!! Form::select('busstop', ['' => 'Select'] +$busstop,'',array('class'=>'form-control','id'=>'busstop','style'=>'width:350px;'));!!}
               
    </div>
    
	<div class="form-group">
        <div>{!! Form::submit('Save', array('class' => 'btn btn-primary form-control','style'=>'width:150px;')) !!}{!! link_to(URL::previous(), 'Cancel', array('class' => 'btn btn-primary form-control','style'=>'width:150px;margin-left:10px;')) !!}
		 
		</div>
		
    </div>	
    {!! Form::close() !!}
	</div>
  </div>
</div>  
