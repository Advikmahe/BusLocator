	@extends('layouts.default')
 
	@section('content')
	  
	  
    
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
	@if(!empty($userprofile))
	{!! Form::open(array('url' => '/update','method'=>'POST','files'=>'true')) !!}	
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4> Edit User Profile</h4>
            </div>
           
        </div>
    </div>
	<div class="form-group">
		 
		 {{ Form::hidden('userid', $userprofile->id) }}
        {!! Form::label('Name', 'Name:') !!}
        {!! Form::text('Name',$userprofile->name,array('class'=>'form-control','placeholder' => 'Name','style'=>'width:350px;')) !!}
    </div>
	<div class="form-group">
		 
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::email('Email', $userprofile->email,array('class'=>'form-control','placeholder' => 'Email','style'=>'width:350px;')) !!}
    </div>
	<div class="form-group">
		
        {!! Form::label('Profile Image', 'Profile Image:') !!}
		<img src="{{ asset('uploads/' . $userprofile->profilepic) }}" style="width:50px;height:50px;" />
        {!! Form::file('Profileimage') !!}
    </div>
	<div class="form-group">
		 
        {!! Form::label('Phone', 'Phone:') !!}
        {!! Form::number('Phone',$userprofile->phone,array('class'=>'form-control','placeholder' => 'Phone','style'=>'width:350px;')) !!}
    </div>
	@else
		{!! Form::open(array('url' => '/store','method'=>'POST','files'=>'true','id' => 'form-add-profile')) !!}
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4> Create User Profile</h4>
            </div>
           
        </div>
    </div>
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
	</div>	
	<div class="form-group">
		
        {!! Form::label('Name', 'Name:') !!}
        {!! Form::text('Name',null,array('class'=>'form-control', 'id' => 'Name','placeholder' => 'Name','style'=>'width:350px;')) !!}
    </div>
	<div class="form-group">
		 
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::email('Email', null,array('class'=>'form-control','id' => 'Email','placeholder' => 'Email','style'=>'width:350px;')) !!}
    </div>
	<div class="form-group">
		 
        {!! Form::label('Profile Image', 'Profile Image:') !!}		
        {!! Form::file('Profileimage') !!}
    </div>
	<div class="form-group">
		
        {!! Form::label('Phone', 'Phone:') !!}
        {!! Form::number('Phone',null,array('class'=>'form-control','id' => 'Phone','style'=>'width:350px;')) !!}
    </div>
	@endif
    
	<div class="form-group">
        <div>{!! Form::submit('Save', array('class' => 'btn btn-primary form-control','id'=>'send-btn','style'=>'width:150px;')) !!}
		 
		</div>
		
    </div>	
    {!! Form::close() !!}
	@endsection
	