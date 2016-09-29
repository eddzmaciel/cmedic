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
					<h2>Editar Usuario </h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						{!! Form::model($user,['id'=>'frmUsuarios','class'=>'smart-form','method' => 'PATCH','route'=>['api_admin.usuarios.update',$user->id]]) !!}
							{!! Form::token() !!}
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="label">Nombre</label>
										<label class="input">
											{!! Form::text('name',null,['class'=>'input-sm']) !!}
										</label>
									</section>									
									<section class="col col-6">
										<label class="label">Email</label>
										<label class="input">
											{!! Form::text('email',null,['class'=>'input-sm']) !!}
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-6">
										<label class="label">Direccion</label>
										<label class="input">
											{!! Form::text('direccion',null,['class'=>'input-sm']) !!}											
										</label>
									</section>
									<section class="col col-6">
										<label class="label">Telefono</label>
										<label class="input">
											{!! Form::text('telefono',null,['class'=>'input-sm']) !!}											
										</label>
									</section>
								</div>								
							</fieldset>
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="label">Tipo de Usuario</label>
											<label class="select">
											{!! Form::select('role_id', array('1' => 'Administrador','2' => 'Administrador Contable','3' => 'Auxiliar Contable','4' => 'Recepcionista','5' => 'Enfermeros'), array('class' => 'input-sm')) !!}
											<i></i> </label>
									</section>
									<section class="col col-6">
										<label class="label">* Sucursal</label>
										<label class="select">
											{!! Form::select('id_sucursal',$cat,$user->id_sucursal, array('class' => 'input-sm select2')) !!}
									</section>
								</div>
								<div class="row" id="clave_estaciones" style="display:none;">
									<section class="col col-6">
										<label class="label">Clave</label>
										<label class="input">
											<i class="icon-append fa fa-lock"></i>
											{!! Form::text('clave_estacion',null,['class'=>'input-sm']) !!}
										</label>
									</section>									
								</div>
								<div class="row">
									<section class="col col-6">
										<label class="label">* Estado</label>
										<div class="row">
											<div class="col col-4">
												<label class="radio">													
													{!! Form::radio('estatus', 0, true, ['class' => 'field' ]) !!}
													<i></i>Activado</label>
												<label class="radio">
													{!! Form::radio('estatus', 1, false, ['class' => 'field']) !!}
													<i></i>Desactivado</label>
											</div>
										</div>
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
					    {!! Form::close() !!}						
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
<!-- <script src="{{ asset('assets/js/inventario/app_administrador/edit_usuarios_min.js') }}"></script> -->

