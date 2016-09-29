@extends('login_app')

@section('content')
<form class="smart-form client-form" role="form" method="POST" action="{{ url('/password/reset') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="token" value="{{ $token }}">
	<fieldset>
		<section>
			<label class="input text-center"><h4> - Reestablecer Contraseña - </h4></label>
		</section>
	</fieldset>
	<fieldset>
		<section>
			<label class="label">Email</label>
			<label class="input"> <i class="icon-append fa fa-user"></i>											
				<input type="email" name="email" value="{{ old('email') }}">
				<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingresa tu email registrado</b></label>
		</section>

		<section>
			<label class="label">Contraseña</label>
			<label class="input"> <i class="icon-append fa fa-lock"></i>
				<input type="password" name="password">
				<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingresa tu contraseña</b> </label>
		</section>

		<section>
			<label class="label">Confirme su contraseña</label>
			<label class="input"> <i class="icon-append fa fa-lock"></i>
				<input type="password" name="password_confirmation">
				<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Nuevamente ingrese su contraseña</b> </label>
		</section>
	</fieldset>
	<footer>
		<button type="submit" class="btn btn-success">
			Reestablecer
		</button>
		<a class="btn btn-danger" href="/"><i class="fa fa-remove"></i> Salir</a>
	</footer>
</form>
@endsection

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
