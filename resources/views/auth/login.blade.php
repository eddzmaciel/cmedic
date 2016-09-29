@extends('login_app')

@section('content')
<form class="smart-form client-form" role="form" method="POST" action="{{ url('/auth/login') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<section>
			<label class="label">Nombre de usuario</label>
			<label class="input"> <i class="icon-append fa fa-user"></i>											
				<input type="email" name="email" placeholder="contador@con360.mx" value="{{ old('email') }}">
				<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingresa tu nombre de usuario</b></label>
		</section>

		<section>
			<label class="label">Contraseña</label>
			<label class="input"> <i class="icon-append fa fa-lock"></i>
				<input type="password" name="password" placeholder="******">
				<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingresa tu contraseña</b> </label>
			<div class="note">
				<a class="btn btn-link" href="{{ url('/password/email') }}">Olvidaste tu contraseña?</a>
			</div>
		</section>

		<section>
			<label class="checkbox">
				<input type="checkbox" name="remember">
				<i></i>Recordar mi cuenta</label>
		</section>
		<section>
			
		</section>
	</fieldset>
	<footer>
		<button type="submit" class="btn btn-primary">
			Iniciar sesi&oacute;n
		</button>
	</footer>
</form>
@endsection

@section('error')
<div class="row">
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Oops!</strong> Al parecer hubo algunos problemas.<br><br>
			<ul>						
				<li>La informacion que usted ingreso no es correcta.</li>
			</ul>
		</div>
	@endif
</div>
@endsection
