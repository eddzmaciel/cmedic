<div class="widget-body-toolbar" id="btnGroupButton" >
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<form class="">							
				<fieldset>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<select style="width:100%" name="id_empresa_g" id="id_empresa_g" class="select2">
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<select style="width:100%" name="id_sucursal_g" id="id_sucursal_g" class="select2">
									<option value="">Seleccione una empresa</option>
								</select>
							</div>
						</div>
					</div>											
				</fieldset>																												
			</form>							
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
			<button class="btn btn-labeled btn-primary" type="button" id="btnNuevaEmpresa" style="display:none;">
				<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
				Agregar
			</button>											
			<!-- <button class="btn btn-labeled btn-warning" type="button" id="btnClonar">
				<span class="btn-label"><i class="glyphicon glyphicon-refresh"></i></span>
				Clonar
			</button> -->
		</div>
	</div>
</div>
<div id="cargandoInfoEmpresas" style="margin-top: 25px;margin-bottom: 25px;">
	<h2 class="text-center"><img src="/img/logo_title.png" style="width: 150px;"> <i class="fa fa-refresh fa-spin txt-color-blueDark"></i> Seleccione una empresa... </h2>
</div>
<form action="/api_cont/empleados" id="frmEmpleados" method="POST" class="smart-form" style="display:none;">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<input type="hidden" name="id_empresa" id="id_empresa_cuentas_b" />
	<input type="hidden" name="id_sucursal" id="id_sucursal_b" />
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
<div class="table-responsive" id="tbEmpresas" style="display:none;">
	<table id="tblData" class="table table-hover table-striped" width="100%">
		<thead>
			<tr>
				<th data-class="expand">Id</th>
				<th data-hide="phone">Nombre</th>
				<th data-hide="phone">RFC</th>
				<th data-hide="phone">Puesto</th>
				<th data-hide="phone">Sal. Nominal</th>
				<th data-hide="phone">SDI</th>
				<th data-hide="phone">Fecha alta</th>
				<th data-hide="phone">Fecha baja</th>
				<th data-hide="phone">Sucursal</th>
				<th data-hide="phone">Email</th>
				<th width="85px">Acciones</th>
			</tr>
		</thead>
	</table>
</div>

<script type="text/javascript">
	_g.dao = {
		getTable :function(){
			$.ajax({
				url: '/api_cont/empleados',
				type: 'GET',
				dataType: 'json',
				success: function(data){
					if(data.length != 0){
						var datelist = data;var table = $('#tblData');
						var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
						    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
						    	          {"aTargets" : [ 2 ], "mData" : "rfc"},
						    	          {"aTargets" : [ 3 ], "mData" : "puesto"},
						    	          {"aTargets" : [ 4 ], "mData" : "salario_nomina"},
						    	          {"aTargets" : [ 5 ], "mData" : "sdi"},
						    	          {"aTargets" : [ 6 ], "mData" : "fecha_alta"},
						    	          {"aTargets" : [ 7 ], "mData" : "fecha_baja"},
						    	          {"aTargets" : [ 8 ], "mData" : "id_sucursal"},
						    	          {"aTargets" : [ 9 ], "mData" : "email"},
						    	          {
											"aTargets": [ 10 ],
											"mData": null,
											"mRender": function (o) { 
												return '<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminar(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
											}
										  }];
						_gen.setTableNE(table,columnDefs,datelist);
					}else{
						$('#tblData').dataTable();
						_gen.notificacion_min('Error', 'No se encontraron registros con error',4);
					}
				}
			}).done(function (data){
				$('#cargandoInfoEmpresas').hide();
				$('#tbEmpresas').show('slow');
			});
		},
		getEliminar :function(id){
			$.ajax({
				url: '/api_cont/empleados/'+id,
				type: 'DELETE',
				dataType: 'json',			
			}).done(function(data){
				_g.dao.getTable();
				_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
			}).fail(function(data){
				_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
			});
		},
		getModificar :function(id){
			$.ajax({
				url: '/api_cont/empresas/'+id,
				type: 'GET',
				dataType: 'json',			
			}).done(function(data){
				_g.dao.getLimpiar();
				$('#emp_id_empresa').val(id);
				$('#emp_nombre').val(data.nombre);
				$('#emp_rfc').val(data.rfc);
				$('#emp_calle').val(data.calle);
				$('#emp_num_exterior').val(data.num_exterior);
				$('#emp_num_interior').val(data.num_interior);
				$('#emp_pais').val(data.pais);
				$('#emp_estado').val(data.estado);
				$('#emp_ciudad_municipio').val(data.ciudad_municipio);
				$('#emp_colonia').val(data.colonia);
				$('#emp_codigo_postal').val(data.codigo_postal);
				$('#emp_piso').val(data.piso);
				$('#emp_telefono').val(data.telefono);
				$('#emp_email_uno').val(data.email_uno);
				$('#emp_email_dos').val(data.email_dos);
				$('#emp_sitio_web').val(data.sitio_web);
				if(data.gravados_excentos != '' || data.gravados_excentos != null){
					$("#emp_gravados_excentos").prop("checked", true);
				}if(data.gravados_excentos == null || data.gravados_excentos == ''){
					$("#emp_gravados_excentos").prop("checked", false);
				}if(data.multicuentas != '' || data.multicuentas != null){
					$("#emp_multicuentas").prop("checked", true);
				}if(data.multicuentas == null || data.multicuentas == ''){
					$("#emp_multicuentas").prop("checked", false);
				}
				$('#EditarEmpresaModal').modal('show');		
			}).fail(function(data){
				_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
			});
		},
		getLimpiar :function(){
			$('#emp_id_empresa').val('');
			$('#emp_nombre').val('');
			$('#emp_rfc').val('');
			$('#emp_calle').val('');
			$('#emp_num_exterior').val('');
			$('#emp_num_interior').val('');
			$('#emp_pais').val('');
			$('#emp_estado').val('');
			$('#emp_ciudad_municipio').val('');
			$('#emp_colonia').val('');
			$('#emp_codigo_postal').val('');
			$('#emp_piso').val('');
			$('#emp_telefono').val('');
			$('#emp_email_uno').val('');
			$('#emp_email_dos').val('');
			$('#emp_sitio_web').val('');
			$("#emp_gravados_excentos").prop("checked", false);
			$("#emp_multicuentas").prop("checked", false);
		},
	};

	var functionEmpresas = function() {
		_g.listas.getEmpresasId($('#id_empresa_g'));
		$('#id_sucursal_g').select2();

		$("#id_empresa_g").change(function (event){
			if($('#id_empresa_g').val() != 0){
				$('#id_empresa_cuentas_b').val($('#id_empresa_g').val());
				_g.listas.getEmpresasSucursalesId($("#id_empresa_g").val(), $("#id_sucursal_g"));
				$('#btnNuevaEmpresa').show();
			}else{
				$('#cargandoInfoEmpresas').show();
				$('#btnNuevaEmpresa, #tbEmpresas, #frmEmpleados').hide();
			}
		});
		$("#id_empresa").change(function(event) {
			_g.listas.getEmpresasSucursales();
		});
		$("#id_sucursal").change(function(event) {
			_g.dao.getEmpleadosSucursal($("#id_sucursal").val());
		});


		_g.dao.getTable();

		$('#btnEditarEmpresa').on('click',function (e){
			e.preventDefault();
			if($("#frmEmpleadosEditar").valid() == true && $("#emp_id_empresa").val() != ''){
				$.ajax({
					url: '/api_cont/empresas/'+$("#emp_id_empresa").val(),
					data: $('#frmEmpleadosEditar').serializeObject(),
					type: 'PUT'
				}).done(function(data) {
					_g.dao.getLimpiar();
					_g.dao.getTable();
					_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
					$('#EditarEmpresaModal').modal('hide');
				}).fail(function(data) {
				    _gen.notificacion_min('Error', data.responseText,4);
					$('#EditarEmpresaModal').modal('hide');
				});
			}
		});

		$('#btnNuevaEmpresa').click(function (e){
			e.preventDefault();
			$('#tbEmpresas, #cargandoInfoEmpresas').hide();
			$('#frmEmpleados').show('slow');
		});

		$('#btnCancelNuevaEmpresa').click(function (e){
			e.preventDefault();
			$('#tbEmpresas, #frmEmpleados').hide();
			$('#cargandoInfoEmpresas').show('slow');
			_g.dao.getTable();
		});

		$("#frmEmpleadosEditar").validate({
			rules:{
				nombre : {
					required :true
				},
				rfc : {
					required :true
				},
				calle : {
					required :true
				},
				num_exterior : {
					required :true
				},
				colonia : {
					required :true
				},
				codigo_postal : {
					required :true
				},
				ciudad_municipio : {
					required :true
				},
				estado : {
					required :true
				},				
				pais : {
					required :true
				}
			},
			messages : {
				nombre : {
					required : "Es obligatorio llenar los datos",
				},
				rfc : {
					required : "Es obligatorio llenar los datos",
				},
				calle : {
					required : "Es obligatorio llenar los datos",
				},				
				num_exterior : {
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
				pais : {
					required : "Es obligatorio llenar los datos",
				}						
			},
			submitHandler : function(form) {
			    form.preventDefault();
			}
		});

	};

	functionEmpresas();
</script>