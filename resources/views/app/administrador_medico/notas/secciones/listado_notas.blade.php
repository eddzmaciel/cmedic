<!-- LISTADO -->
<div class="widget-body-toolbar" id="btnGroupButton" style="padding-bottom:0px;">
	<div class="row">
		<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
			<form class="smart-form">
				<div class="row">
					<section class="col col-6">
						<label class="select">
							
						</label>								
					</section>
					<section class="col col-6">
						<label class="select">
							
						</label>
					</section>
				</div>
			</form>
		</div>
		<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
			<button class="btn btn-labeled btn-primary" type="button" id="btnNuevo">
				<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
				Nuevo Registro
			</button>
											
		</div>
	</div>
</div>

<!--  DATO NUEVO -->
<form action="/api_med/notas/" id="frmNuevoDato" method="POST" class="smart-form" style="display:none;">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<header style="margin: 0px 14px 0;">
		Crear nuevo registro
	</header>
	<fieldset>
	
		<div class="row">																	
			<section class="col col-6">
				<label class="label">Fecha de Emision</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text" required class="input-sm" name="nfecha_emision" id="nipt1" placeholder="Seleccione Fecha de Emision." >
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
			<section class="col col-6">
				<label class="label">Medicamentos</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text" required class="input-sm" name="nmedicamentos" id="nipt2" placeholder="Escribir los Medicamentos." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
		</div>
		<div class="row">
			<section class="col col-6">
				<label class="label">Estatus</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text"  required class="input-sm" name="nestatus" id="nipt3" placeholder="Escribe el Estatus." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
			<section class="col col-6">
				<label class="label">Notas Adicionales</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text" required class="input-sm" name="nestatus" id="nipt4" placeholder="Escribe Notas Adicionales" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
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
				<th data-hide="phone">Id</th>
				<th data-hide="phone">Fecha de Emision</th>
				<th data-hide="phone">Medicamentos</th>
				<th data-hide="phone">Estatus de Receta</th>  <!-- id paciente-->
				<th data-hide="phone">Notas Adicionales</th> <!-- id medico--> 
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
					<input type="hidden" name="id" id="inpt1">
					<fieldset>
						<div class="row">		
								
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Fecha de Emision</label>
									<label class="input-group">
										<input type="date" class="form-control" name="nfecha_emision" id="inpt2" >
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>						
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Medicamentos</label>
									<label class="input-group">
										<input type="text" class="form-control" name="nmedicamentos" id="inpt3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Estatus Receta</label>
									<label class="input-group">
										<input type="number" class="form-control datepicker" disabled="disabled" name="nestatus" id="inpt4" >
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Notas Adicionales</label>
									<label class="input-group">
										<input type="text" class="form-control"  name="nnotas" id="inpt5" tyle="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
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
					url: '/api_med/notas/',
					type: 'GET',
					dataType: 'json',
					success: function(data){
							if(data.length != 0){
						/*$.each(data, function(i) {
						if(data[i].estatus == 0){
						 	data[i].label_estatus = '<a href="javascript:void(0);" readonly="true" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-remove"></i></a>';
							}else if(data[i].estatus == 1){
						 	data[i].label_estatus = '<a href="javascript:void(0);" readonly="true" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>';
							}
						});*/
							var datelist = data;var table = $('#tblData');
							var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
							    	          {"aTargets" : [ 1 ], "mData" : "nfecha_emision"},
							    	          {"aTargets" : [ 2 ], "mData" : "nmedicamentos"},
							    	          {"aTargets" : [ 3 ], "mData" : "nestatus"},
							    	          {"aTargets" : [ 4 ], "mData" : "nnotas"},
							    	          {	"aTargets": [ 5 ], "mData": null,
												"mRender": function (o) { 
													return '<a class="btn btn-sm btn-success" onclick="_g.dao.getModificarDatos(' + o.id + ')">' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'+
															'<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarDatos(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
																		}
											  }];
							_gen.setTableNE(table,columnDefs,datelist);
						}
						else{
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
						url: '/api_med/notas/'+id,
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
						url: '/api_med/info_notas/'+id,
						type: 'GET',
						dataType: 'json',			
					}).done(function(data){
						_g.dao.getLimpiarDatos();
						$('#inpt1').val(id);
						$('#inpt2').val(data.nfecha_emision);
						$('#inpt3').val(data.nmedicamentos);
						$('#inpt4').val(data.nestatus);
						$('#inpt5').val(data.nnotas);
						$('#EditarDatosModal').modal('show');		
					}).fail(function(data){
						_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de modificar la información, intente de nuevo.',4);
					});
				},

			getLimpiarDatos :function(){
					$('#inpt1').val('');
					$('#inpt2').val('');
					$('#inpt3').val('');
					$('#inpt4').val('');
					$('#inpt5').val('');
					$('#inpt6').val('');
					$('#inpt7').val('');
					$('#inpt8').val('');
				},
			}; 
		var functionOperacionesForm = function() {
				_g.dao.getTable();
				
				$('#btnAceptarEditar').on('click',function (e){
					e.preventDefault();
					if($("#frmEditarDatos").valid() == true && $("#inpt1").val() != ''){
						$.ajax({
							url: '/api_med/notas/'+$("#inpt1").val(),
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

				/*$("#frmEditarDatos").validate({
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
				});*/

				$("#inpt2").datepicker({ 
					dateFormat: 'yy-mm-dd',
					language: "es" 
					});
				$("#nipt1").datepicker({ 
					dateFormat: 'yy-mm-dd',
					language: "es" 
					});


			}; 
			functionOperacionesForm(); 


</script>
<!--// SCRIPT-->