<!-- LISTADO -->
<div class="widget-body-toolbar" id="btnGroupButton" style="padding-bottom:0px;">
	<div class="row">
		<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
			<form class="smart-form">
				<div class="row">
					
					<section class="col col-6">

					</section>
					<section class="col col-6">

					</section>

				</div>
			</form>
		</div>
		<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
			<button class="btn btn-labeled btn-primary" type="button" id="btnNuevo">
				<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
				Nuevo Paciente
			</button>									
		</div>
	</div>
</div>
<!--  DATO NUEVO -->
<form action="/api_cont/empleados/" id="frmNuevoDato" method="POST" class="smart-form" style="display:none;">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<header style="margin: 0px 14px 0;">
		Crear nuevo empleado
	</header>
	<fieldset>
		<div class="row">	
			<section class="col col-6">
				<label class="label">Nombre del Empleado</label>
				<label class="input">
					<i class="icon-append fa fa-question-circle"></i>
					<input type="text" class="input-sm" name="nombre" id="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
			<section class="col col-6">
				<label class="label">Estatus</label>
				<label class="select">
					<select class="input-sm select2" name="estatus" id="estatus" >
						<option value="0">Activo</option>
						<option value="1">Inactivo</option>
					</select>
					</label>
			</section>
			<section class="col col-6">
				<label class="label">Rfc</label>
				<label class="input">
					<i class="icon-append fa fa-question-circle"></i>
					<input type="text" class="input-sm" name="rfc" id="rfc" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observaci&oacute;n</strong> Campo Obligatorio</b>
				</label>															
			</section>																			
		</div>
		<div class="row">
			<section class="col col-6">
				<label class="label">Puesto</label>
				<label class="input">
					<input type="text" class="input-sm" name="puesto" id="puesto" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
				</label>
			</section>
			<section class="col col-3">
				<label class="label">Salario N&oacute;mina</label>
				<label class="input">
					<input type="text" class="input-sm" name="salario_nomina" id="salario_nomina">
				</label>
			</section>
			<section class="col col-3">
				<label class="label">Sdi</label>
				<label class="input">
					<input type="text" class="input-sm" name="sdi" id="sdi">
				</label>
			</section>
		</div>
		<div class="row">
			<section class="col col-6">
				<label class="label">Fecha Alta</label>
				<label class="input">
					<input type="text" class="input-sm" name="fecha_alta" id="nva_fecha_alta" >
				</label>
			</section>
			<section class="col col-3">
				<label class="label">Fecha Baja</label>
				<label class="input">
					<input type="text" class="input-sm" name="fecha_baja" id="nva_fecha_baja">
				</label>
			</section>
				<section class="col col-3">
				<label class="label">Id Sucursal</label>
				<label class="input">
					<input type="text" class="input-sm" name="id_sucursal" id="id_sucursal">
				</label>
			</section>
		</div>
	</fieldset>
	<!--BOTONES-->
	<footer>
		<button type="submit" id="btnAgregarNuevo" class="btn btn-primary">
			Agregar
		</button>
		<button type="button" id="btnCancelarNuevo" class="btn btn-default">
			Cancelar
		</button>
	</footer>	
	<!--// BOTONES-->																									
</form>
<!-- // CLIENTE NUEVO-->
<!--MOSTRAR DATOS REGISTRADOS-->
<div class="table-responsive" id="tbDatos" style="display:true;">
	<table id="tblData" class="table table-hover table-striped" width="100%">
	<thead>
		<tr>
			<th data-class="expand">Estatus</th>
			<th data-class="expand">Id</th>
			<th data-hide="phone">Nombre</th>
			<th data-hide="phone">RFC</th>
			<th data-hide="phone">Puesto</th>
			<th data-hide="phone">Sal. Nominal</th>
			<th data-hide="phone">SDI</th>
			<th data-hide="phone">Fecha alta</th>
			<th data-hide="phone">Fecha baja</th>
			<th data-hide="phone">Sucursal</th>
			<th width="85px">Acciones</th>
		</tr>
	</thead>
</table>
</div>
<!-- // MOSTRAR DATOS REGISTRADOS -->
<!-- MODIFICAR DATOS -->
<div class="modal fade in" id="EditarDatosModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="false" style="display: none;">
	<div class="modal-backdrop fade in" style="height: 539px;"></div>  
	<div class="modal-dialog">  
		<div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel"><span id="logo"> <img src="/img/logo_title.png" alt="SmartAdmin"> </span></h4>
			</div>
			<!-- CONTENIDO MODAL-->
			<div class="modal-body">
				<form class="" id="frmEditarDatos">
					<input type="hidden" name="id" id="edt_id">
					<fieldset>
						<div class="row">		
							<div class="col-sm-12">
							</div>				
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Nombre Empleado</label>
									<label class="input-group">
										<input type="text" class="form-control" name="nombre" id="edt_nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>						
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Rfc</label>
									<label class="input-group">
										<input type="text" class="form-control" name="rfc" id="edt_rfc" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Puesto</label>
									<label class="input-group">
										<input type="text" class="form-control" name="puesto" id="edt_puesto" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Salario Nomina</label>
									<label class="input-group">
										<input type="text" class="form-control" name="salario_nomina" id="edt_salario_nomina">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
								<div class="col-sm-12">
								<div class="form-group">
									<label for="">Sdi</label>
									<label class="input-group">
										<input type="text" class="form-control" name="sdi" id="edt_sdi">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Fecha Alta</label>
									<label class="input-group">
										<input type="text" class="form-control" name="fecha_alta" id="edt_fecha_alta">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
						<div class="col-sm-12">
								<div class="form-group">
									<label for="">Fecha Baja</label>
									<label class="input-group">
										<input type="text" class="form-control" name="fecha_baja" id="edt_fecha_baja">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
						<div class="col-sm-12">
						<div class="form-group">
							<label for="">Id Sucursal</label>
							<label class="input-group">
								<input type="text" class="form-control" name="id_sucursal" id="edt_id_sucursal">
								<span class="input-group-addon"><i class="fa fa-list"></i></span>
							</label>
						</div>
					</div>
						
						</div>					
					</fieldset>																												
				</form>	
			</div>
			<!-- // CONTENIDO MODAL-->
			<!-- BOTONES-->
			<div class="modal-footer">
				<button class="btn btn-labeled btn-primary" type="button" id="btnAceptarEditar">
					<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
					Aceptar
				</button>	
		
			</div>
			<!--// BOTONES-->
		</div>  
	</div>  
</div>
<!-- // MODIFICAR DATOS-->
<!-- SCRIPT-->
<script type="text/javascript">

 	_g.dao = {
		getTable :function(){
				$.ajax({
					url: 'api_cont/empleados',
					type: 'GET',
					dataType: 'json',
					success: function(data){
							if(data.length != 0){

								$.each(data, function(i) {
							
								if(data[i].estatus == 0){
								 	data[i].label_estatus = '<a href="javascript:void(0);" readonly="true" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-remove"></i></a>';
								}else if(data[i].estatus == 1){
								 	data[i].label_estatus = '<a href="javascript:void(0);" readonly="true" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>';
								}
							});

							var datelist = data;var table = $('#tblData');
							var columnDefs = [{"aTargets" : [ 0 ], "mData" : "label_estatus"},
										  {"aTargets" : [ 1 ], "mData" : "id"},
						    	          {"aTargets" : [ 2 ], "mData" : "nombre"},
						    	          {"aTargets" : [ 3 ], "mData" : "rfc"},
						    	          {"aTargets" : [ 4 ], "mData" : "puesto"},
						    	          {"aTargets" : [ 5 ], "mData" : "salario_nomina"},
						    	          {"aTargets" : [ 6 ], "mData" : "sdi"},
						    	          {"aTargets" : [ 7 ], "mData" : "fecha_alta"},
						    	          {"aTargets" : [ 8 ], "mData" : "fecha_baja"},
						    	          {"aTargets" : [ 9 ], "mData" : "id_sucursal"},

							    	          {
												"aTargets": [ 10 ],
												"mData": null,
												"mRender": function (o) { 
													return '<a class="btn btn-sm btn-success" onclick="_g.dao.getModificarDatos(' + o.id + ')">' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'+
															'<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarDatos(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
												}


											  }];
							_gen.setTableNE(table,columnDefs,datelist);
						}else{
							$('#tblData').dataTable();
							_gen.notificacion_min('Error', 'No se encontraron registros con error',4);
						}
					}
				}).done(function (data){
					$('#tbDatos').show('slow');
				});
			},
		getEliminarDatos :function(id){
					$.ajax({
						url: 'api_cont/empleados/'+id,
						type: 'DELETE',
						dataType: 'json',			
					}).done(function(data){
						_g.dao.getTable();
						_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
					}).fail(function(data){
						_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
					});
				},
		getModificarDatos :function(id){
					$.ajax({
						url: '/api_cont/info_empleados/'+id,
						type: 'GET',
						dataType: 'json',			
					}).done(function(data){
						_g.dao.getLimpiarDatos();			
						$('#edt_id').val(id);
						$('#edt_nombre').val(data.nombre);
						$('#edt_rfc').val(data.rfc);
						$('#edt_puesto').val(data.puesto);
						$('#edt_salario_nomina').val(data.salario_nomina);
						$('#edt_sdi').val(data.sdi);
						$('#edt_fecha_alta').val(data.fecha_alta);
						$('#edt_telefono').val(data.telefono);
						$('#edt_fecha_baja').val(data.fecha_baja);	
						$('#edt_id_sucursal').val(data.id_sucursal);		
				

						$('#EditarDatosModal').modal('show');		
					}).fail(function(data){
						_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de modificar la información, intente de nuevo.',4);
					});
				},
		getEliminarDatos :function(id){
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
		getLimpiarDatos :function(){
				$('#estatus').val('');
				$('#nombre').val('');
				$('#rfc').val('');
				$('#puesto').val('');
				$('#salario_nomina').val('');
				$('#sdi').val('');
				$('#fecha_alta').val('');
				$('#telefono').val('');
				$('#fecha_baja').val('');
				$('#id_sucursal').val('');
			},
		}; 
		var functionOperacionesForm = function() {
			_g.dao.getTable();

				$('#btnAceptarEditar').on('click',function (e){
					e.preventDefault();
					if($("#frmEditarDatos").valid() == true && $("#edt_id").val() != ''){
						$.ajax({
							url: '/api_cont/empleados/'+$("#edt_id").val(),
							data: $('#frmEditarDatos').serializeObject(),
							type: 'PUT'
						}).done(function(data) {
							_g.dao.getLimpiarDatos();
							_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
							$('#EditarDatosModal').modal('hide');
								_g.dao.getTable();
						}).fail(function(data) {
						    _gen.notificacion_min('Error', data.responseText,4);
							$('#EditarDatosModal').modal('hide');
							_g.dao.getTable();
						});
					}
				});


			$('#btnCambioStatus').on('click',function (e){
					e.preventDefault();
					if($("#frmEditarDatos").valid() == true && $("#edt_id").val() != ''){
						$.ajax({
							url: '/api_cont/empleados/'+$("#edt_id").val(),
							data: $('#frmEditarDatos').serializeObject(),
							type: 'PUT'
						}).done(function(data) {
							_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
								_g.dao.getTable();
						}).fail(function(data) {
						    _gen.notificacion_min('Error', data.responseText,4);
							_g.dao.getTable();
						});
					}
				});

				/*
				$('#btnCancelarEditar').click(function (e){
					e.preventDefault();
					$( '#EditarDatosModal').hide();
					//$('#cargandoInfoEmpresas').show('slow');
				});*/
				$('#btnNuevo').click(function (e){
					e.preventDefault();
					$('#tbDatos').hide();
					$('#frmNuevoDato').show('slow');
				});
				$('#btnCancelarNuevo').click(function (e){
					e.preventDefault();
					$( '#frmNuevoDato').hide();
					//$('#cargandoInfoEmpresas').show('slow');
					_g.dao.getTable();
				});
				
				$("#frmEditarDatos").validate({
					rules:{
						estatus : {
							required :true
						},
						nombre : {
							required :true
						},
						num_exterior : {
							required :true
						},
						codigo_postal : {
							required :true
						},
						num_interior : {
							required :true
						},
						rfc : {
							required :true
						},
						telefono : {
							required :true
						},				
						ciudad_municipio : {
							required :true
						}
					},
					messages : {
						estatus : {
							required : "Es obligatorio llenar los datos",
						},
						nombre : {
							required : "Es obligatorio llenar los datos",
						},
						num_exterior : {
							required : "Es obligatorio llenar los datos",
						},				
						codigo_postal : {
							required : "Es obligatorio llenar los datos",
						},
						num_interior : {
							required : "Es obligatorio llenar los datos",
						},
						rfc : {
							required : "Es obligatorio llenar los datos",
						},
						telefono : {
							required : "Es obligatorio llenar los datos",
						},				
						ciudad_municipio : {
							required : "Es obligatorio llenar los datos",
						}						
					},
					submitHandler : function(form) {
					    form.preventDefault();
					}
				});
				$("#frmNuevoDato").validate({
					rules:{
						estatus : {
							required :true
						},
						nombre : {
							required :true
						},
						num_exterior : {
							required :true
						},
						codigo_postal : {
							required :true
						},
						num_interior : {
							required :true
						},
						rfc : {
							required :true
						},
						telefono : {
							required :true
						},				
						ciudad_municipio : {
							required :true
						}
					},
					messages : {
						estatus : {
							required : "Es obligatorio llenar los datos",
						},
						nombre : {
							required : "Es obligatorio llenar los datos",
						},
						num_exterior : {
							required : "Es obligatorio llenar los datos",
						},				
						codigo_postal : {
							required : "Es obligatorio llenar los datos",
						},
						num_interior : {
							required : "Es obligatorio llenar los datos",
						},
						rfc : {
							required : "Es obligatorio llenar los datos",
						},
						telefono : {
							required : "Es obligatorio llenar los datos",
						},				
						ciudad_municipio : {
							required : "Es obligatorio llenar los datos",
						}						
					},
					submitHandler : function(form) {
					    form.preventDefault();
					}
				});

			//CAMPOS DE FECHAS
				$("#edt_fecha_alta").datepicker({ 
					dateFormat: 'yy-mm-dd',
					language: "es" 
				});
				$("#edt_fecha_baja").datepicker({ 
					dateFormat: 'yy-mm-dd',
					language: "es" 
				});
				$("#nva_fecha_baja").datepicker({ 
					dateFormat: 'yy-mm-dd',
					language: "es" 
				});
				$("#nva_fecha_alta").datepicker({ 
					dateFormat: 'yy-mm-dd',
					language: "es" 
				});
			//--CAMPOS DE FECHAS

			}; 
			functionOperacionesForm(); 

</script>
<!--// SCRIPT-->