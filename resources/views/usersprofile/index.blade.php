@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Users List</h4>
            </div>
            <div class="pull-right">
               <span >  <a class="btn btn-success" href="{{ route('Userprofile.create') }}">Create New User</a></span>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
			<th>Image</th>
            <th width="280px">Action</th>
        </tr>
		
    @foreach ($usersprofile as $key =>$profile)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $profile->name}}</td>
        <td>{{ $profile->email}}</td>
		<td><img src="{{ asset('uploads/' . $profile->profilepic) }}" style="width:150px;height:150px;" /></td>
        <td>
            <a class="btn btn-info" href="{{ route('Userprofile.show',$profile->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('Userprofile.edit',$profile->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['Userprofile.destroy', $profile->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $usersprofile->render() !!}
@endsection