<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>  
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
	<!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Locate Bus Stop<span style="padding-left:50px;"><a href="{{url('/buses/create')}}" class="btn btn-success">Register a bus</a></span><span style="padding-left:50px;"><a href="{{url('/logout')}}" class="btn btn-success">Logout</a></span></div>
	  
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
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Select User Location:</label>
                {!! Form::select('country', ['' => 'Select'] +$userlocation,'',array('class'=>'form-control','id'=>'userlocation','style'=>'width:350px;'));!!}
               
            </div>
            <div class="form-group">
                <label for="title">Select Bus Stop Id:</label>
                <select name="busstop" id="busstop" class="form-control" style="width:350px">
                </select>
            </div>
         
            <div class="form-group">
                <label for="title">Select Buses:</label>
                <select name="bus" id="bus" class="form-control" style="width:350px">
                </select>
            </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    $('#userlocation').change(function(){
    var userlocationID = $(this).val();  
alert("alert"+userlocationID);	
    if(userlocationID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-busstop-list')}}?userlocation_id="+userlocationID,
           success:function(res){               
            if(res){
                $("#busstop").empty();
                $("#busstop").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#busstop").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#busstop").empty();
            }
           }
        });
    }else{
        $("#busstop").empty();
        $("#bus").empty();
    }      
   });
    $('#busstop').on('change',function(){
    var busstopID = $(this).val();    
    if(busstopID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-bus-list')}}?busstop_id="+busstopID,
           success:function(res){               
            if(res){
                $("#bus").empty();
                $.each(res,function(key,value){
                    $("#bus").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#bus").empty();
            }
           }
        });
    }else{
        $("#bus").empty();
    }
        
   });
</script>
</body>
</html>