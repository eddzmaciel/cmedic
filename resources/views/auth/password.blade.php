@extends('login_app')
@section('content')
<form class="smart-form client-form" role="form" method="POST" action="{{ url('/password/email') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<section>
			<label class="input text-center"><h4> - Recuperar Contraseña - </h4></label>
		</section>
	</fieldset>
	<fieldset>
		<section>
			<label class="label">Ingresa tu correo electronico</label>
			<label class="input"> <i class="icon-append fa fa-user"></i>											
				<input type="email" name="email" value="{{ old('email') }}">
				<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingresa tu email para restablecer la contraseña</b></label>
		</section>
			
		</section>
	</fieldset>
	<footer>		
		<button type="submit" class="btn btn-success">
			Recuperar
		</button>
		<a class="btn btn-danger" href="/"><i class="fa fa-remove"></i> Salir</a>
	</footer>
</form>
@endsection
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
@section('error')
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Oops!</strong> Al parecer hubo algunos problemas.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
@endsection
