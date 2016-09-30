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
<form action="/api_med/pacientes/" id="frmNuevoDato" method="POST" class="smart-form" style="display:none;">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<header style="margin: 0px 14px 0;">
		Crear nuevo registro
	</header>
	<fieldset>
		<div class="row">																	
			<section class="col col-6">
				<label class="label">Nombre</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text" required class="input-sm" name="pnombre" id="nipt1" placeholder="Escribe tu Nombre." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
			<section class="col col-6">
				<label class="label">Apellidos</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text" required class="input-sm" name="papellidos" id="nipt2" placeholder="Escribe tus Apellidos." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
		</div>
		<div class="row">
			<section class="col col-6">
				<label class="label">Email</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="email"  required class="input-sm" name="pemail" id="nipt3" placeholder="Escribe tu Email." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
			<section class="col col-6">
				<label class="label">Tel&eacute;fono</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="number" required class="input-sm" name="ptelefono" id="nipt4" placeholder="Escribe el numero Telefónico."  >
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
		</div>
		<div class="row">
			<section class="col col-6">
				<label class="label">Edad</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="number" required class="input-sm" name="pedad" id="nipt5" placeholder="Escribe el Tipo de Sangre." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
			<section class="col col-6">
				<label class="label">Direccion</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text" required class="input-sm" name="pdireccion" id="nipt6" placeholder="Escribe la Direccion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
		</div>

		<div class="row">
			<section class="col col-6">
				<label class="label">Tipo de Sangre</label>
				<label class="input">
				<i class="icon-append fa fa-question-circle"></i>
					<input type="text" required class="input-sm" name="ptipo_sangre" id="nipt7" placeholder="Escribe el Tipo de Sangre." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
					<b class="tooltip tooltip-top-right">
					<i class="fa fa-warning txt-color-teal"></i> 
					<strong>Observacion</strong> Campo Obligatorio</b>
				</label>
			</section>
		</div>
	</fieldset>
	<!--BOTONES-->
	<footer>
		<button type="submit" value="sumit" onclick="return _g.dao.getWmail()"  id="btnAgregarNuevo" class="btn btn-primary" >
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
				<th data-hide="phone">Nombre(s)</th>
				<th data-hide="phone">Apellidos</th>
				<th data-hide="phone">Edad</th> 
				<th data-hide="phone">Direccion</th> 
				<th data-hide="phone">Telefono</th> 
				<th data-hide="phone">Tipo Sangre</th> 
				<th data-hide="phone">Email</th> 
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
									<label for="">Nombre</label>
									<label class="input-group">
										<input type="text" class="form-control" name="pnombre" id="inpt2" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>						
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Apellidos</label>
									<label class="input-group">
										<input type="text" class="form-control" name="papellidos" id="inpt3" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Edad</label>
									<label class="input-group">
										<input type="text" class="form-control datepicker" name="pedad" id="inpt4" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Direccion</label>
									<label class="input-group">
										<input type="text" class="form-control" name="pdireccion" id="inpt5" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Telefono</label>
									<label class="input-group">
										<input type="text" class="form-control" name="ptelefono" id="inpt6" >
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Tipo de Sangre</label>
									<label class="input-group">
										<input type="text" class="form-control" name="ptipo_sangre" id="inpt7" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="">Email</label>
									<label class="input-group">
										<input type="email" class="form-control" name="pemail" id="inpt8" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
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


<!-- CONFIRMACION MODAL 
<div class="modal fade in" id="ConfModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="false" style="display: none;">
	<div class="modal-backdrop fade in" style="height: 539px;"></div>  
	<div class="modal-dialog">  
		<div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel"><span id="logo"> <img src="/img/logo_title.png" alt="SmartAdmin"> </span></h4>
			</div>

			<h1>¿Esta seguro de eliminar el registro?</h1>

			<div class="modal-footer">
				<button type="submit" value="sumit" onclick="_g.dao.getEliminarDatos(' + o.id + ')"  id="btnAcElim" class="btn btn-danger" >Aceptar</button>
				<button type="button" id="btnCanElim" class="btn btn-default">Cancelar</button>
		
			</div>
		</div>  
	</div>  
</div>
 // CONFIRMACION MODAL-->


<!-- SCRIPT-->
<script type="text/javascript">

	_g.dao = {

			getTable :function(){
					$.ajax({
						url: '/api_med/pacientes/',
						type: 'GET',
						dataType: 'json',
						success: function(data){
								if(data.length != 0){
								var datelist = data;var table = $('#tblData');
								var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
								    	          {"aTargets" : [ 1 ], "mData" : "pnombre"},
								    	          {"aTargets" : [ 2 ], "mData" : "papellidos"},
								    	          {"aTargets" : [ 3 ], "mData" : "pedad"},
								    	          {"aTargets" : [ 4 ], "mData" : "pdireccion"},
								    	          {"aTargets" : [ 5 ], "mData" : "ptelefono"},
								    	          {"aTargets" : [ 6 ], "mData" : "ptipo_sangre"},
								    	          {"aTargets" : [ 7 ], "mData" : "pemail"},
								    	          {	"aTargets": [ 8 ], "mData": null,
													"mRender": function (o) { 
														return '<a class="btn btn-sm btn-success" onclick="_g.dao.getModificarDatos(' + o.id + ')">' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'+
																'<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarDatos(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'/*+'<a class="btn btn-sm btn-danger" onclick="_g.dao.getModal(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'*/; 
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
							url: '/api_med/pacientes/'+id,
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
							url: '/api_med/info_pacientes/'+id,
							type: 'GET',
							dataType: 'json',			
						}).done(function(data){
							_g.dao.getLimpiarDatos();
							$('#inpt1').val(id);
							$('#inpt2').val(data.pnombre);
							$('#inpt3').val(data.papellidos);
							$('#inpt4').val(data.pedad);
							$('#inpt5').val(data.pdireccion);
							$('#inpt6').val(data.ptelefono); 
							$('#inpt7').val(data.ptipo_sangre); 
							$('#inpt8').val(data.pemail); 
							$('#EditarDatosModal').modal('show');		
							}).fail(function(data){
								_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de modificar la información, intente de nuevo.',4);
						});
					},

			getModal:function(id){
				$('#ConfModal').modal('show');		
					},

			getWmail :function(){
					///if($("#frmNuevoDato").valid() == true && $("#inpt1").val() != ''){	
		               $.ajax({
		                       type:"GET",
		                       url:'/webs/mail/',
		                       data: {pnombre:$('#nipt1').val(),pemail:$('#nipt3').val()},
		                       success: function(data) {
		                       			//console.log(data);
		                               _gen.notificacion_min('&Eacute;xito', 'Registro y notificaci&oacute;n exitosamente realizada.',1);
		                           }, 
		                        error: function(data) { 
		                        	//console.log(data);
		                        	_gen.notificacion_min('Error', data.responseText,4)
		                        }
		                   });
		           		//}

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

					$('#nipt1').val('');
					$('#nipt2').val('');
					$('#nipt3').val('');
					$('#nipt4').val('');
					$('#nipt5').val('');
					$('#nipt6').val('');
					$('#nipt7').val('');
					},
		 			}; 

		var functionOperacionesForm = function() {
				_g.dao.getTable();

				$('#btnAceptarEditar').on('click',function (e){
					e.preventDefault();
					if($("#frmEditarDatos").valid() == true && $("#inpt1").val() != ''){
						$.ajax({
							url: '/api_med/pacientes/'+$("#inpt1").val(),
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

				/*$("#nipt4").mask("(999)-999-9999");
				$("#inpt6").mask("(999)-999-9999");*/

				$("#frmEditarDatos").validate({
					rules:{
							inpt1 : {
								required :true
							},
							inpt2 : {
								required :true
							},
							inpt3 : {
								required :true
							},
							inpt4 : {
								required :true
							},
							inpt5 : {
								required :true
							},
							inpt6 : {
								required :true
							},
							inpt7 : {
								required :true
							},				
							inpt8 : {
								required :true
							}
						},
					messages : {
							inpt1 : {
								required : "Es obligatorio llenar los datos",
							},
							inpt2 : {
								required : "Es obligatorio llenar los datos",
							},
							inpt3 : {
								required : "Es obligatorio llenar los datos",
							},				
							inpt4 : {
								required : "Es obligatorio llenar los datos",
							},
							inpt5 : {
								required : "Es obligatorio llenar los datos",
							},
							inpt6 : {
								required : "Es obligatorio llenar los datos",
							},
							inpt7 : {
								required : "Es obligatorio llenar los datos",
							},				
							inpt8 : {
								required : "Es obligatorio llenar los datos",
							}						
						},	
						submitHandler : function(form) {
						    form.preventDefault();
						}
					});
				$("#frmNuevoDato").validate({
						rules:{
							nipt1 : {
								required :true
							},
							nipt2 : {
								required :true
							},
							nipt3 : {
								required :true
							},
							nipt4 : {
								required :true
							},
							nipt5 : {
								required :true
							},
							nipt6 : {
								required :true
							},
							nipt7 : {
								required :true
							}			
							},
						messages : {
							nipt1 : {
								required : "Es obligatorio llenar los datos",
							},
							nipt2 : {
								required : "Es obligatorio llenar los datos",
							},
							nipt3 : {
								required : "Es obligatorio llenar los datos",
							},				
							nipt4 : {
								required : "Es obligatorio llenar los datos",
							},
							nipt5 : {
								required : "Es obligatorio llenar los datos",
							},
							nipt6 : {
								required : "Es obligatorio llenar los datos",
							},
							nipt7 : {
								required : "Es obligatorio llenar los datos",
							},					
							},
						submitHandler : function(form) {
						    form.preventDefault(); 
						}
					});


			}; 
			functionOperacionesForm(); 



</script>
<!--// SCRIPT-->