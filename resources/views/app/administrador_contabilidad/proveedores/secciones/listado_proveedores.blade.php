<!-- LISTADO CLIENTES-->
<div class="widget-body-toolbar" id="btnGroupButton" style="padding-bottom:0px;">
	<div class="row">
		<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
			<form class="smart-form">
				<div class="row">
					<section class="col col-6">
						<label class="select">
							<select class="form-control select2" name="id_empresa" id="id_empresa" style="border: 0px solid #ccc;height: 32px;padding: 0;">
								<option value="1">Seleccione Empresa</option>
							</select> <i></i> 
						</label>								
					</section>
					<section class="col col-6">
						<label class="select">
							<select class="form-control select2" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
								<option value="">Seleccione una Empresa</option>
							</select> <i></i> 
						</label>
					</section>
				</div>
			</form>
		</div>
		<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
			<button class="btn btn-labeled btn-primary" type="button" id="btnNuevo">
				<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
				Nuevo Proveedor
			</button>
			<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
				<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
				Modificar
			</button>
			<button class="btn btn-labeled btn-warning" type="button" onclick="window.location.href='/#contabilidad/clientes/importacion'">
				<span class="btn-label"><i class="glyphicon glyphicon-upload"></i></span>
				Clientes XML
			</button>									
		</div>
	</div>
</div>

<!--  DATO NUEVO -->
<form action="/api_cont/proveedores/" id="frmNuevoDato" method="POST" class="smart-form" style="display:none;">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<header style="margin: 0px 14px 0;">
		Crear nuevo proveedor
	</header>
	<fieldset>
		<div class="row">	
			<section class="col col-6">
				<label class="label">Nombre del Proveedor</label>
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
				<label class="label">L&iacute;mite Cr&eacute;dito</label>
				<label class="input">
					<i class="icon-append fa fa-question-circle"></i>
					<input type="text" class="input-sm" name="num_exterior" id="num_exterior">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observaci&oacute;n</strong> Campo Obligatorio</b>
				</label>															
			</section>																			
		</div>
		<div class="row">
			<section class="col col-6">
				<label class="label">Saldo</label>
				<label class="input">
					<input type="text" class="input-sm" name="codigo_postal" id="codigo_postal">
				</label>
			</section>
			<section class="col col-3">
				<label class="label">Saldo Corriente</label>
				<label class="input">
					<input type="text" class="input-sm" name="num_interior" id="num_interior">
				</label>
			</section>
			<section class="col col-3">
				<label class="label">Saldo Vencido</label>
				<label class="input">
					<input type="text" class="input-sm" name="rfc" id="rfc">
				</label>
			</section>
		</div>
		<div class="row">
			<section class="col col-6">
				<label class="label">Tel&eacute;fono</label>
				<label class="input">
					<input type="text" class="input-sm" name="telefono" id="telefono" >
				</label>
			</section>
			<section class="col col-3">
				<label class="label">Contacto</label>
				<label class="input">
					<input type="text" class="input-sm" name="ciudad_municipio" id="ciudad_municipio">
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
				<th data-hide="phone">Estatus</th>
				<th data-hide="phone">id</th>
				<th data-hide="phone">Nombre</th> 
				<th data-hide="phone">Limite credito(p)</th> <!--num_exterior-->
				<th data-hide="phone">Saldo(p)</th> <!--codigo_postal -->
				<th data-hide="phone">Saldo corriente(p)</th> <!-- num_interior-->
				<th data-hide="phone">Saldo vencido(p)</th> <!--rfc -->
				<th data-hide="phone">Telefono</th>
				<th data-hide="phone">Contacto(p)</th><!--ciudad_municipio -->
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
					<input type="hidden" name="id" id="edt_idproveedor">
					<fieldset>
						<div class="row">		
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Estatus</label>
									<label class="input-group">
										<input type="text" class="form-control" name="estatus" id="edt_estatus">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>				
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Nombre Proveedor</label>
									<label class="input-group">
										<input type="text" class="form-control" name="nombre" id="edt_nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>						
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">L&iacute;mite Cr&eacute;dito</label>
									<label class="input-group">
										<input type="text" class="form-control" name="num_exterior" id="edt_limitecredito">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Saldo</label>
									<label class="input-group">
										<input type="text" class="form-control datepicker" name="codigo_postal" id="edt_saldo">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Saldo Corriente</label>
									<label class="input-group">
										<input type="text" class="form-control" name="num_interior" id="edt_saldocorriente">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Saldo Vencido</label>
									<label class="input-group">
										<input type="text" class="form-control" name="rfc" id="edt_saldovencido">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Tel&eacute;fono</label>
									<label class="input-group">
										<input type="text" class="form-control" name="telefono" id="edt_telefono">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Contacto</label>
									<label class="input-group">
										<input type="text" class="form-control" name="ciudad_municipio" id="edt_contacto">
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
					url: '/api_cont/proveedores/',
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
							    	          {"aTargets" : [ 3 ], "mData" : "num_exterior"},
							    	          {"aTargets" : [ 4 ], "mData" : "codigo_postal"},
							    	          {"aTargets" : [ 5 ], "mData" : "num_interior"},
							    	          {"aTargets" : [ 6 ], "mData" : "rfc"},
							    	          {"aTargets" : [ 7 ], "mData" : "telefono"},
							    	          {"aTargets" : [ 8 ], "mData" : "ciudad_municipio"},
							    	          {
												"aTargets": [ 9 ],
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
						url: '/api_cont/proveedores/'+id,
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
						url: '/api_cont/info_proveedor/'+id,
						type: 'GET',
						dataType: 'json',			
					}).done(function(data){
						_g.dao.getLimpiarDatos();
						$('#edt_idproveedor').val(id);
						$('#edt_estatus').val(data.estatus);
						$('#edt_nombre').val(data.nombre);
						$('#edt_limitecredito').val(data.num_exterior); //pendiente
						$('#edt_saldo').val(data.codigo_postal); //pendiente
						$('#edt_saldocorriente').val(data.num_interior); //pendiente
						$('#edt_saldovencido').val(data.rfc);//pendiente
						$('#edt_telefono').val(data.telefono);
						$('#edt_contacto').val(data.ciudad_municipio);	//pendiente

						$('#EditarDatosModal').modal('show');		
					}).fail(function(data){
						_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de modificar la información, intente de nuevo.',4);
					});
				},

		getLimpiarDatos :function(){
				$('#nombre').val('');
				$('#estatus').val('');
				$('#num_exterior').val('');
				$('#codigo_postal').val('');
				$('#num_interior').val('');
				$('#rfc').val('');
				$('#ciudad_municipio').val('');
			},
			}; 
		var functionOperacionesForm = function() {
				_g.dao.getTable();
				
				$('#btnAceptarEditar').on('click',function (e){
					e.preventDefault();
					if($("#frmEditarDatos").valid() == true && $("#edt_idproveedor").val() != ''){
						$.ajax({
							url: '/api_cont/proveedores/'+$("#edt_idproveedor").val(),
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
			}; 
			functionOperacionesForm(); 


</script>
<!--// SCRIPT-->