@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Usuarios</div>
			<div class="card-body">
		<form action="{{Route('usuarios.update',$user->id)}}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" required class="form-control" value="{{$users->name}}">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" required class="form-control" value="{{$users->email}}">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" required class="form-control"  value="{{$users->password}}">
			</div>
			<div class="form-group">
				<label for="role">Role</label>
				<select class="form-control" name="role">
					@foreach($roles as $key => $value)
					@if($users->hasRole($value))
					<option value="{{$value}}" selected>{{$value}}</option>
					@else
					<option value="{{$value}}" >{{$value}}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="row justify-content-end pb-2">
	<input type="submit" value="registrar" class="btn btn-primary">
</div>
		</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection