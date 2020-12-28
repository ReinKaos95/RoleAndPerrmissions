<form action="{{Route('usuarios.destroy',$user->id)}}" method="post" style="display: inline-block;">
			@method('DELETE')
			@csrf
			<button type="submit" class="btn btn-danger">Destroy</button>
		</form>