<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Administrador 
			<span>> 
				Usuarios
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
		</ul>
	</div>
</div>
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WfrmUsuarios">
			<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Nuevo Usuario </h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<form action="/api_admin/usuarios" id="frmUsuarios" method="POST" class="smart-form" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="label">* Nombre</label>
										<label class="input">
											<i class="icon-append fa fa-user"></i>
											<input type="text" class="input-sm" name="name" id="name">
										</label>
									</section>									
									<section class="col col-6">
										<label class="label">* Email</label>
										<label class="input">
											<i class="icon-append fa fa-envelope-o"></i>
											<input type="text" class="input-sm" name="email" id="email">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-6">
										<label class="label">* Contraseña</label>
										<label class="input">
											<i class="icon-append fa fa-lock"></i>
											<input type="password" class="input-sm" name="password" id="password">
										</label>
									</section>
									<section class="col col-6">
										<label class="label">* Repetir Contraseña</label>
										<label class="input">
											<i class="icon-append fa fa-lock"></i>
											<input type="password" class="input-sm" name="password_confirmation" id="password_confirmation">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-6">
										<label class="label">Direccion</label>
										<label class="input">
											<i class="icon-append fa fa-briefcase"></i>
											<input type="text" class="input-sm" name="direccion" id="direccion">
										</label>
									</section>
									<section class="col col-6">
										<label class="label">Telefono</label>
										<label class="input">
											<i class="icon-append fa fa-phone"></i>
											<input type="text" class="input-sm" name="telefono" id="telefono">
										</label>
									</section>
								</div>
							</fieldset>
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="label">* Tipo de Usuario</label>
										<label class="select">
											<select class="input-sm" name="role_id" id="role_id">
												<option value="1">Administrador</option>
												<option value="2">Administrador Contable</option>
												<option value="3">Auxiliar Contable</option>
												<option value="4">Recepcionista</option>
												<option value="5">Doctor</option>
												<option value="6">Enfermeros</option>
											</select> <i></i> </label>
									</section>
									<section class="col col-6">
										<label class="label">* Sucursal</label>
										<label class="select">
											<select class="form-control" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
											</select> <i></i> </label>
									</section>
								</div>
								<div class="row" id="clave_estaciones" style="display:none;">
									<section class="col col-6">
										<label class="label">Clave</label>
										<label class="input">
											<i class="icon-append fa fa-lock"></i>
											<input type="text" class="input-sm" name="clave_estacion" id="clave_estacion">
										</label>
									</section>									
								</div>
								<div class="row">
									<section class="col col-6">
										<label class="label">* Estado</label>
										<div class="row">
											<div class="col col-4">
												<label class="radio">
													<input type="radio" value="0" name="estatus" checked="checked">
													<i></i>Activado</label>
												<label class="radio">
													<input type="radio" value="1" name="estatus">
													<i></i>Desactivado</label>
											</div>
										</div>
									</section>
									<section class="col col-6">
										<label class="label">Avatar</label>
										<label for="file" class="input input-file">
											<div class="button"><input type="file" name="avatar" onchange="this.parentNode.nextSibling.value = this.value">Cargar</div><input type="text" placeholder="Selcciona avatar" readonly="">
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<button type="submit" id="btnAdd" class="btn btn-primary">
									Guardar
								</button>
								<button type="button" id="btnCancel" class="btn btn-default" onclick="window.history.back();">
									Cancelar
								</button>
							</footer>
						</form>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		$("#frmUsuarios").validate({
			rules:{
				name:{
					required : true
				},
				email:{
					required : true,
					email : true
				},
				password:{
					required : true,
					minlength : 3,
					maxlength : 20
				},
				password_confirmation: {
					equalTo: "#password"					
				},
				role_id : {
					required : true,
				},
				id_sucursal : {
					required : true,
				}
			},
			messages : {
				name:{
					required : "Es obligatorio llenar los datos",
				},
				email:{
					required : "Es obligatorio llenar los datos",
					email : "El formato del correo no es valido",
				},
				password:{
					required : "Es obligatorio llenar los datos",
					minlength : "El minimo de caracteres son 3",
					maxlength : "El maximo de caracteres son 20",
				},
				password_confirmation: {
					equalTo: "Los password no coinciden",					
				},
				role_id : {
					required : "Es obligatorio llenar los datos",
				},
				id_sucursal : {
					required : "Es obligatorio llenar los datos",
				}
			},
			submitHandler : function(form) {
			    form.submit();
			}
		});

		_g.listas.getSucursales();

		$('#role_id').change(function (){
			console.log( $(this).val() );
			if( $(this).val() === '5' || $(this).val() === '6'){
				$('#clave_estaciones').show('slow');
			}else{
				$('#clave_estaciones').hide();
			}
		});
	};
	pagefunction();
</script>
<!-- <script src="/js/usuariosjs/usuarios.js"></script>
<script src="/js/usuariosjs/dao.js"></script>
<script src="/js/usuariosjs/funciones.js"></script>
<script src="/js/usuariosjs/init.js"></script> -->

