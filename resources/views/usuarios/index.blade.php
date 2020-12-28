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
			<a href="{{url('/usuarios/'.$user->id.'/edit')}}" class="btn btn-primary">Update</a>
			<a href="#" class="btn btn-danger">Destroy</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="row justify-content-end pb-2">
	<a a href="{{url('/usuarios/create')}}" class="btn btn-success">Register</a>
</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection