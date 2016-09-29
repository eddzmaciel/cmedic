<div class="row">
	<div class="col-sm-6">
		<div class="well well-sm">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="well well-light well-sm no-margin no-padding">
						<div class="row">
							<div class="col-sm-12">
								<div id="myCarousel" class="carousel fade profile-carousel" style="display:block;">
									<div class="air air-bottom-right padding-10">
										<img src="img/logo.png" alt="" style="width:160px;">
									</div>
									<div class="air air-top-left padding-10">
										<h4 class="txt-color-white font-md"><?php $dt = new DateTime(); echo $dt->format('Y-m-d');?></h4>
									</div>
									<ol class="carousel-indicators">									
									</ol>
									<div class="carousel-inner">
										<!-- Slide 1 -->
										<div class="item active">
											<img src="img/bg-login.jpg" alt="demo user"	>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-3 profile-pic">
										<img src="/uploads/avatares/{{Auth::user()->avatar}}" alt="Foto del usuario" style="background-color: #FFFFFF;">
									</div>
									<div class="col-sm-9">
										<h1>{{Auth::user()->name}}</span>
										<br>
										<small> 
											@if (Auth::user()->role_id == 1)
												Administrador
											@endif
											@if (Auth::user()->role_id == 2)
												Administrador Contable
											@endif
											@if (Auth::user()->role_id == 3)
												Auxiliar Contable
											@endif
											@if (Auth::user()->role_id == 4)
												Recepcionista
											@endif
											@if (Auth::user()->role_id == 5)
												Enfermeros
											@endif
										</small></h1>
										<ul class="list-unstyled">
											<li>
												<p class="text-muted">
													<i class="fa fa-phone"></i>&nbsp;&nbsp;<span class="txt-color-darken">{{Auth::user()->telefono}}</span>
												</p>
											</li>
											<li>
												<p class="text-muted">
													<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:simmons@smartadmin">{{Auth::user()->email}}</a>
												</p>
											</li>
											<li>
												<p class="text-muted">
													<i class="fa fa-map-marker"></i>&nbsp;&nbsp;<a href="mailto:simmons@smartadmin">{{Auth::user()->direccion}}</a>
												</p>
											</li>									
										</ul>
										<br>
									</div>									
								</div>
							</div>
						</div>						
					</div>
				</div>				
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WfrmUsuarios">
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Modificar Informaci&oacute;n</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body no-padding">
							<form action="/api_admin/modificacion_base" id="frmModificarUsuario" method="POST" class="smart-form" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
								<fieldset>									
									<section>
										<label class="label">* Contraseña</label>
										<label class="input">
											<i class="icon-append fa fa-lock"></i>
											<input type="password" class="input-sm" name="password" id="password">
										</label>
									</section>
									<section>
										<label class="label">* Repetir Contraseña</label>
										<label class="input">
											<i class="icon-append fa fa-lock"></i>
											<input type="password" class="input-sm" name="password_confirmation" id="password_confirmation">
										</label>
									</section>
								</fieldset>								
								<footer>
									<button type="submit" id="btnAdd" class="btn btn-primary">
										Actualizar
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
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WfrmUsuarios">
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Personaliza tu foto de usuario</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body no-padding">
							<form action="/api_admin/modificacion_avatar" id="frmModificarAvatar" method="POST" class="smart-form" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
								<fieldset>									
									<section>
										<label class="label">Avatar</label>
										<label for="file" class="input input-file">
											<div class="button"><input type="file" name="avatar" onchange="this.parentNode.nextSibling.value = this.value">Cargar</div><input type="text" placeholder="Selcciona avatar" readonly="">
										</label>
									</section>
								</fieldset>								
								<footer>
									<button type="submit" id="btnAdd" class="btn btn-primary">
										Cambiar Foto
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
	</div>
</div>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		$("#frmModificarUsuario").validate({
			rules:{
				password:{
					required : true,
					minlength : 3,
					maxlength : 20
				},
				password_confirmation: {
					equalTo: "#password"					
				}
			},
			messages : {
				password:{
					required : "Es obligatorio llenar los datos",
					minlength : "El minimo de caracteres son 3",
					maxlength : "El maximo de caracteres son 20",
				},
				password_confirmation: {
					equalTo: "Los password no coinciden",					
				}
			},
			submitHandler : function(form) {
			    form.submit();
			}
		});
		$("#frmModificarAvatar").validate({
			rules:{
				avatar : {
					required : true,
				}
			},
			messages : {
				avatar : {
					required : "Es obligatorio adjuntar una foto",
				}
			},
			submitHandler : function(form) {
			    form.submit();
			}
		});
	};
	pagefunction();
</script>