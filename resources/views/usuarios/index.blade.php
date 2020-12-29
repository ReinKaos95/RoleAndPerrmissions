@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Usuarios</div>
			<div class="card-body">
				<table class="table">
	<thead>
		<th>Name</th>
		<th>Email</th>
		<th>Roles</th>
		<th>Acciones</th>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->roles->implode('name', ',')}}</td>
			<td>
			@can('update user')
			<a href="{{url('/usuarios/'.$user->id.'/edit')}}" class="btn btn-primary">Update</a>
			@endcan
			@can('delete user')
			@include('usuarios.delete',['user'=>$user])
			@endcan
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@can('create user')
<div class="row justify-content-end pb-2">
	<a a href="{{url('/usuarios/create')}}" class="btn btn-success">Register</a>
</div>
@endcan
			</div>
		</div>
	</div>
</div>
</div>
@endsection