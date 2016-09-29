<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Nuevo 
			<span>> 
				Empleado
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
			<div class="jarviswidget" id="wid-id-100" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Formulario </h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding fuelux">
						<div class="wizard">
							<ul class="steps">
								<li data-target="#step1" class="active">
									<span class="badge badge-info">1</span>GENERAL<span class="chevron"></span>
								</li>												
							</ul>
							<div class="actions">
								<button type="button" class="btn btn-sm btn-primary btn-prev">
									<i class="fa fa-arrow-left"></i>Anterior
								</button>
								<button type="button" class="btn btn-sm btn-success btn-next" data-last="Finish">
									Siguiente<i class="fa fa-arrow-right"></i>
								</button>
							</div>
						</div>
						<div class="step-content">
							<div class="step-pane active" id="step1">
								<form action="/api_cont/empleados" id="frmEmpleados" method="POST" class="smart-form">
									<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
									<fieldset>
										<div class="row">
											<section class="col col-4">
												<label class="select">
													<select class="form-control" name="id_empresa" id="id_empresa" style="border: 0px solid #ccc;height: 32px;padding: 0;">
													</select> <i></i> </label>
											</section>
											<section class="col col-4">
												<label class="select">
													<select class="form-control" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
														<option value="">Seleccione una empresa</option>
													</select> <i></i> </label>
											</section>									
										</div>
										<div class="row">											
											<section class="col col-4">
												<label class="label">Nombre del empleado</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">RFC</label>
												<label class="input">
													<input type="text" class="input-sm" name="rfc" id="rfc">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">CURP</label>
												<label class="input">
													<input type="text" class="input-sm" name="curp" id="curp">
												</label>
											</section>
											<section class="col col-2">
												<label class="label">Fecha de alta</label>
												<label class="input">
													<input type="text" class="input-sm datepicker" name="fecha_alta" id="fecha_alta">
												</label>
											</section>
											<section class="col col-2">
												<label class="label">Fecha de baja</label>
												<label class="input">
													<input type="text" class="input-sm datepicker" name="fecha_baja" id="fecha_baja">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">Regimen de pago SAT</label>
												<label class="select">
													<select class="input-sm" name="regimen_pago_sat" id="regimen_pago_sat">
														<option value="1">Seleccione regimen</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-4">
												<label class="label">Puesto</label>
												<label class="select">
													<select class="input-sm" name="puesto" id="puesto">
														<option value="1">Seleccione un puesto</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-3">
												<label class="label">Salario nomina </label>
												<label class="input">
													<input type="text" class="input-sm" name="salario_nomina" id="salario_nomina">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">SDI</label>
												<label class="input">
													<input type="text" class="input-sm" name="sdi" id="sdi">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Numero Seguro Social</label>
												<label class="input">
													<input type="text" class="input-sm" name="nss" id="nss">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Tipo de Contrato SAT</label>
												<label class="input">
													<input type="text" class="input-sm" name="tipo_contrato_sat" id="tipo_contrato_sat">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Periodo de pago SAT</label>
												<label class="input">
													<input type="text" class="input-sm" name="periodo_pago_sat" id="periodo_pago_sat">
												</label>
											</section>																																									
											<section class="col col-3">
												<label class="label">Calle</label>
												<label class="input">
													<input type="text" class="input-sm" name="calle" id="calle">
												</label>
											</section>
											<section class="col col-2">
												<label class="label"># Exterior</label>
												<label class="input">
													<input type="text" class="input-sm" name="num_exterior" id="num_exterior">
												</label>
											</section>
											<section class="col col-2">
												<label class="label"># Interior</label>
												<label class="input">
													<input type="text" class="input-sm" name="num_interior" id="num_interior">
												</label>
											</section>
											<section class="col col-2">
												<label class="label">Codigo Postal</label>
												<label class="input">
													<input type="text" class="input-sm" name="codigo_postal" id="codigo_postal">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Colonia</label>
												<label class="input">
													<input type="text" class="input-sm" name="colonia" id="colonia">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Ciudad / Municipio</label>
												<label class="select">
													<select class="input-sm" name="ciudad_municipio" id="ciudad_municipio">
														<option value="1">Seleccione municipio</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-3">
												<label class="label">Estado</label>
												<label class="select">
													<select class="input-sm" name="estado" id="estado">
														<option value="1">Seleccione estaddo</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-3">
												<label class="label">Pais</label>
												<label class="select">
													<select class="input-sm" name="pais" id="pais">
														<option value="1">Seleccione pais</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-3">
												<label class="label">Piso</label>
												<label class="input">
													<input type="text" class="input-sm" name="piso" id="piso">
												</label>
											</section>																									
											<section class="col col-3">
												<label class="label">Email</label>
												<label class="input">
													<input type="text" class="input-sm" name="email" id="email">
												</label>
											</section>											
										</div>							
									</fieldset>														
									<footer>
										<button type="submit" id="btnAdd" class="btn btn-primary">
											Agregar
										</button>
										<button type="button" id="btnCancel" class="btn btn-default" onclick="window.history.back();">
											Cancelar
										</button>
									</footer>
								</form>
								<div class="row" style="margin: 25px 0 0;">
									<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
										<form class="smart-form">
											<div class="row">
												<section class="col col-4">
													<label class="select">
														<select class="form-control select2" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
															<option value="1">Banco</option>
														</select> <i></i> </label>								
												</section>
												<section class="col col-4">
													<label class="select">
														<select class="input-sm select2" name="estatus_table" id="estatus_table">
															<option value="1">Moneda</option>
														</select> <i></i> </label>								
												</section>
												<section class="col col-4">
													<label class="select">
														<select class="input-sm select2" name="estatus_table" id="estatus_table">
															<option value="1">#Cuenta</option>
														</select> <i></i> </label>								
												</section>
											</div>
										</form>
									</div>
									<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
										<button class="btn btn-labeled btn-primary" type="button" id="btnNew" onclick="window.location.href='/#facturacion/cuentas/nuevo">
											<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
											Agregar
										</button>
										<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
											<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
											Modificar
										</button>																										
									</div><br>
								</div>
								<div class="table-responsive">
									<table id="tbl2" class="table table-hover table-striped" width="100%">
										<thead>
											<tr>
												<th data-class="expand">Id</th>
												<th data-hide="phone">Banco</th>
												<th data-hide="phone">Moneda</th>
												<th data-hide="phone"># Cuenta</th>
												<th data-hide="phone">Principal</th>
												<th width="65px">Acciones</th>
											</tr>
										</thead>
									</table>
								</div>								
							</div>
						</div>						
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
<script src="assets/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		_g.listas.getEmpresas();
		$('#id_sucursal').select2();
		$("#id_empresa").change(function(event) {
			_g.listas.getEmpresasSucursales();
		});
		$("#frmEmpleados").validate({
			rules:{
				id_sucursal : {
					required : true
				},
				nombre : {
					required : true
				},
				rfc : {
					required : true
				},
				curp : {
					required : true
				},
				fecha_alta : {
					required : true
				},
				fecha_baja : {
					required : true
				},
				regimen_pago_sat : {
					required : true
				},
				puesto : {
					required : true
				},
				salario_nomina : {
					required : true
				},
				sdi : {
					required : true
				},
				nss : {
					required : true
				},
				tipo_contrato_sat : {
					required : true
				},
				periodo_pago_sat : {
					required : true
				},
				calle : {
					required : true
				},
				num_exterior : {
					required : true
				},
				num_interior : {
					required : true
				},
				piso : {
					required : true
				},
				pais : {
					required : true
				},
				colonia : {
					required : true
				},
				codigo_postal : {
					required : true
				},
				ciudad_municipio : {
					required : true
				},
				estado : {
					required : true
				},
				email : {
					required : true
				}
			},
			messages : {
				id_sucursal : {
					required : "Es obligatorio llenar los datos",
				},				
				nombre : {
					required : "Es obligatorio llenar los datos",
				},
				rfc : {
					required : "Es obligatorio llenar los datos",
				},
				curp : {
					required : "Es obligatorio llenar los datos",
				},
				fecha_alta : {
					required : "Es obligatorio llenar los datos",
				},
				fecha_baja : {
					required : "Es obligatorio llenar los datos",
				},
				regimen_pago_sat : {
					required : "Es obligatorio llenar los datos",
				},
				puesto : {
					required : "Es obligatorio llenar los datos",
				},
				salario_nomina : {
					required : "Es obligatorio llenar los datos",
				},
				sdi : {
					required : "Es obligatorio llenar los datos",
				},
				nss : {
					required : "Es obligatorio llenar los datos",
				},
				tipo_contrato_sat : {
					required : "Es obligatorio llenar los datos",
				},
				periodo_pago_sat : {
					required : "Es obligatorio llenar los datos",
				},
				calle : {
					required : "Es obligatorio llenar los datos",
				},
				num_exterior : {
					required : "Es obligatorio llenar los datos",
				},
				num_interior : {
					required : "Es obligatorio llenar los datos",
				},
				piso : {
					required : "Es obligatorio llenar los datos",
				},
				pais : {
					required : "Es obligatorio llenar los datos",
				},
				colonia : {
					required : "Es obligatorio llenar los datos",
				},
				codigo_postal : {
					required : "Es obligatorio llenar los datos",
				},
				ciudad_municipio : {
					required : "Es obligatorio llenar los datos",
				},
				estado : {
					required : "Es obligatorio llenar los datos",
				},
				email : {
					required : "Es obligatorio llenar los datos",
				}				
			},
			submitHandler : function(form) {
			    form.submit();
			}
		});

		var wizard = $('.wizard').wizard();
		wizard.on('change' , function(e, info){
			if(info.step == 1 ) {		  		  		
			    return true; 		
			}			    			    
		}).on('finished', function (e, data) {
			alert('Funcion por terminar');
			//$("#formHistorialMedico").submit();
		}).on('stepclick', function(e){
		return false;
		});
	};
	pagefunction();
</script>


