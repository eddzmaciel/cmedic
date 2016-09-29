<div class="widget-body-toolbar" id="btnGroupButton" >
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<!-- selecciona usuario | cargar -->
			<form class="">							
				<fieldset>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<select style="width:100%" name="id_empresas_cuentas_bancarias" id="id_empresas_cuentas_bancarias" class="select2">
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<select style="width:100%" name="id_sucursal_be" id="id_sucursal_be" class="select2">
									<option value="">Seleccione un cliente</option>
								</select>
							</div>
						</div>
					</div>											
				</fieldset>																												
			</form>	
		<!-- fin selecciona usuario | cargar -->						
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
			<button class="btn btn-labeled btn-primary" type="button" id="btnNuevaCuentaBancaria" style="display:none;">
				<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
				Agregar
			</button>											
		</div>
	</div>
</div>

<!--crear cuenta cliente-->
<form id="frmBancosEmpresas" method="POST" class="smart-form" style="display:none;">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<input type="hidden" name="id_empresa" id="id_empresa_cuentas_b" />
	<input type="hidden" name="id_sucursal" id="id_sucursal_b" />
	<fieldset>
		<div class="row">			
		
			<section class="col col-4">
				<label class="label">Banco</label>
				<label class="select">
					<select class="form-control" name="id_banco" id="id_banco" style="border: 0px solid #ccc;height: 32px;padding: 0;">
					</select> <i></i> </label>
			</section>
		</div>
		<div class="row">									
			<section class="col col-4">
				<label class="label">Moneda</label>
				<label class="select">
					<select class="form-control" name="id_moneda" id="id_moneda" style="border: 0px solid #ccc;height: 32px;padding: 0;">
					</select> <i></i> </label>
			</section>
			<section class="col col-4">
				<label class="label"># Cuenta</label>
				<label class="input">
					<input type="text" class="input-sm" name="num_cuenta" id="num_cuenta_be">
				</label>
			</section>									
										
		</div>
		<div class="row">									
			<section class="col col-4">
				<label class="label">Fecha</label>
				<label class="input">
					<input type="text" class="input-sm" name="fecha" id="fecha_be">
				</label>
			</section>
										
		</div>
		<div class="row">
			<div class="col col-3">
				<label class="label"></label>
				<label class="checkbox">
					<input type="checkbox" name="principal">
					<i></i>Principal</label>
			</div>
		</div>	
	</fieldset>
	<footer>
		<button type="button" id="btnAddBE" class="btn btn-primary">
			Agregar
		</button>									
	</footer>																																													
</form>
<!-- fin crear cuenta cliente-->

<div id="cargandoInfoCuentasBanco" style="margin-top: 25px;margin-bottom: 25px;">
	<h2 class="text-center"><img src="/img/logo_title.png" style="width: 150px;"> <i class="fa fa-refresh fa-spin txt-color-blueDark"></i> Seleccione un cliente... </h2>
</div>

<div class="table-responsive" id="tbCuentasBanco" style="display:none;">
	<table id="tblDataBE" class="table table-hover table-striped" width="100%">
		<thead>
			<tr>
				<th data-class="expand">Id</th>
				<th data-hide="phone">Banco</th>
				<th data-hide="phone">Moneda</th>
				<th data-hide="phone">Cuenta</th>
				<th data-hide="phone">Principal</th>
				<th data-hide="phone">Saldo Inicial</th>
				<th data-hide="phone">Cta. Contable</th>
				<th data-hide="phone">Cta. Complementaria</th>
				<th width="65px">Acciones</th>																			
			</tr>
		</thead>
	</table>
</div>

<script type="text/javascript">
	
	_g.daoCuentasBanco = {
		getTableBE :function(){
			var parametros = {
				'id_empresa' : $('#id_empresas_cuentas_bancarias').val(),
				'id_sucursal' : $('#id_sucursal_be').val()
			}
			$.ajax({
				url: '/api_cont/cuentas_banco',
				data : parametros,
				type: 'POST',
				dataType: 'json',
				success: function(data){
					$.each(data, function(i) {					
						if(data[i].principal == 0 || data[i].principal == null){
						 	data[i].principal = '<a href="javascript:void(0);" readonly="true" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></a>';
						}if(data[i].principal == 'on'){
						 	data[i].principal = '<a href="javascript:void(0);" readonly="true" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>';
						}
					});
					var datelist = data;var table = $('#tblDataBE');
					var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
					    	          {"aTargets" : [ 1 ], "mData" : "banco"},
					    	          {"aTargets" : [ 2 ], "mData" : "moneda"},
					    	          {"aTargets" : [ 3 ], "mData" : "num_cuenta"},
					    	          {"aTargets" : [ 4 ], "mData" : "principal"},
					    	          {"aTargets" : [ 5 ], "mData" : "saldo_inicial"},
					    	          {"aTargets" : [ 6 ], "mData" : "cuenta_contable"},
					    	          {"aTargets" : [ 7 ], "mData" : "cuenta_complementaria"},
					    	          {
										"aTargets": [ 8 ],
										"mData": null,
										"mRender": function (o) { 
											return '<a class="btn btn-sm btn-danger" onclick="_g.daoCuentasBanco.getEliminarBE(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
										}
									  }];
					_gen.setTableNE(table,columnDefs,datelist);
				}
			}).done(function (data){
				$('#cargandoInfoCuentasBanco, #frmBancosEmpresas').hide();
				$('#tbCuentasBanco').show();
			});
		},

		getEliminarBE :function(id){
			$.ajax({
				url: '/api_cont/bancos_empresas/'+id,
				type: 'DELETE',
				dataType: 'json',			
			}).done(function(data){
				_g.daoCuentasBanco.getTableBE();
				_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
			}).fail(function(data){
				_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
			});
		}

	};


	var functionEjercicios = function() {

		_g.listas.getCatMonedas();
		_g.listas.getCatBancos();
		_g.listas.getEmpresasId($('#id_empresas_cuentas_bancarias'));

		$("#fecha_be").datepicker({ 
			dateFormat: 'yy-mm-dd',
			language: "es" 
		});

		$('#btnNuevaCuentaBancaria').click(function(){
			if($('#id_empresa_ejercicio').val() != '0'){
				$('#frmBancosEmpresas').show('slow');				
				$('#btnNuevaCuentaBancaria, #tbCuentasBanco').hide();
			}else{
				$('#frmBancosEmpresas').show('slow');				
				$('#cargandoInfoCuentasBanco, #tbCuentasBanco').hide();
			}
		});

		$("#id_empresas_cuentas_bancarias").change(function (event){
			if($('#id_empresas_cuentas_bancarias').val() != 0){
				$('#id_empresa_cuentas_b').val($('#id_empresas_cuentas_bancarias').val());
				_g.listas.getEmpresasSucursalesId($("#id_empresas_cuentas_bancarias").val(), $("#id_sucursal_be"));
				_g.listas.getCatCuentasContableAfectablesCuztom($('#id_empresas_cuentas_bancarias').val(),$('#id_cuenta_contable_be'));
				_g.daoCuentasBanco.getTableBE();
				$('#btnNuevaCuentaBancaria').show();
			}else{
				$('#cargandoInfoCuentasBanco').show();
				$('#btnNuevaCuentaBancaria, #tbCuentasBanco, #frmBancosEmpresas').hide();
			}
		});

		$("#id_sucursal_be").change(function (event){
			if($('#id_sucursal_be').val() != 0){
				$('#id_sucursal_b').val($('#id_sucursal_be').val());
				_g.daoCuentasBanco.getTableBE();
				$('#btnNuevaCuentaBancaria').show();
			}else{
				_g.daoCuentasBanco.getTableBE();				
			}
		});

		$('#btnAddBE').click(function(e){
			e.preventDefault();
			if($('#frmBancosEmpresas').valid()){
				if($('#id_moneda').val() == '101'){
					$.ajax({
					    type        : 'POST',
					    url         : '/api_cont/bancos_empresas',
					    data        : $('#frmBancosEmpresas').serializeObject(),
					    dataType    : 'json' 
					}).done(function(data) {
						_g.daoCuentasBanco.getTableBE();
						$('#num_cuenta_be, #saldo_inicial_be, #fecha_be').val('');
						$('#id_moneda').select2().select2("val",'101');
						$('#id_banco').select2().select2("val",'0');
						$('#id_empresa_be').select2().select2("val",'0');
						$('#id_sucursal_be').select2().select2("val",'0');
						$('#id_cuenta_contable').select2().select2("val",'0');
						_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
					});					
				}else{
					if($('#id_cuenta_complementaria_be').val() != 0){
						$.ajax({
						    type        : 'POST',
						    url         : '/api_cont/bancos_empresas',
						    data        : $('#frmBancosEmpresas').serializeObject(),
						    dataType    : 'json' 
						}).done(function(data) {
							_g.daoCuentasBanco.getTableBE();
							$('#num_cuenta_be, #saldo_inicial_be, #fecha_be').val('');
							$('#id_moneda').select2().select2("val",'101');
							$('#id_banco').select2().select2("val",'0');
							$('#id_empresa_be').select2().select2("val",'0');
							$('#id_sucursal_be').select2().select2("val",'0');
							$('#id_cuenta_contable').select2().select2("val",'0');
							_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
						});
					}else{
						_gen.notificacion_min('Aviso', 'Es necesario seleccionar una cuenta complementaria, ya que el tipo de cambio es diferente a Pesos Mexicanos',4);
					}
				}
			}else{
				_gen.notificacion_min('Aviso', 'Es necesario llenar la informaci&oacute;n',4);
			}
		});

	};
	
	functionEjercicios();
	$(document).ready(function(){
	 	$("#frmBancosEmpresas").validate({
			rules:{
				id_banco : {
					required : true,
					valueNotEquals : "0",
				},
				id_moneda : {
					required : true,
					valueNotEquals : "0",
				},
				num_cuenta : {
					required : true,
					number : true
				},
				id_cuenta_contable : {
					required : true,
					valueNotEquals : "0",
				},
				saldo_inicial : {
					required : true,
					number : true
				},
				fecha : {
					required : true
				}
			},
			messages : {
				id_banco : {
					required : "Es obligatorio llenar los datos",
					valueNotEquals : "Es obligatorio seleccionar una opcion",
				},
				id_moneda : {
					required : "Es obligatorio llenar los datos",
					valueNotEquals : "Es obligatorio seleccionar una opcion",
				},
				num_cuenta : {
					required : "Es obligatorio llenar los datos",
					number : "Solo se aceptan digitos"
				},
				id_cuenta_contable : {
					required : "Es obligatorio llenar los datos",
					valueNotEquals : "Es obligatorio seleccionar una opcion",
				},
				saldo_inicial : {
					required : "Es obligatorio llenar los datos",
					number : "Solo se aceptan digitos"
				},
				fecha : {
					required : "Es obligatorio llenar los datos",
				}
			}
		});
	}); 

	/*_g.daoCuentasBanco = {
		getTableBE :function(){
			var parametros = {
				'id_empresa' : $('#id_empresas_cuentas_bancarias').val(),
				'id_sucursal' : $('#id_sucursal_be').val()
			}
			$.ajax({
				url: '/api_cont/cuentas_banco',
				data : parametros,
				type: 'POST',
				dataType: 'json',
				success: function(data){
					$.each(data, function(i) {					
						if(data[i].principal == 0 || data[i].principal == null){
						 	data[i].principal = '<a href="javascript:void(0);" readonly="true" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></a>';
						}if(data[i].principal == 'on'){
						 	data[i].principal = '<a href="javascript:void(0);" readonly="true" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>';
						}
					});
					var datelist = data;var table = $('#tblDataBE');
					var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
					    	          {"aTargets" : [ 1 ], "mData" : "banco"},
					    	          {"aTargets" : [ 2 ], "mData" : "moneda"},
					    	          {"aTargets" : [ 3 ], "mData" : "num_cuenta"},
					    	          {"aTargets" : [ 4 ], "mData" : "principal"},
					    	          {"aTargets" : [ 5 ], "mData" : "saldo_inicial"},
					    	          {"aTargets" : [ 6 ], "mData" : "cuenta_contable"},
					    	          {"aTargets" : [ 7 ], "mData" : "cuenta_complementaria"},
					    	          {
										"aTargets": [ 8 ],
										"mData": null,
										"mRender": function (o) { 
											return '<a class="btn btn-sm btn-danger" onclick="_g.daoCuentasBanco.getEliminarBE(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
										}
									  }];
					_gen.setTableNE(table,columnDefs,datelist);
				}
			}).done(function (data){
				$('#cargandoInfoCuentasBanco, #frmBancosEmpresas').hide();
				$('#tbCuentasBanco').show();
			});
		},

		getEliminarBE :function(id){
			$.ajax({
				url: '/api_cont/bancos_empresas/'+id,
				type: 'DELETE',
				dataType: 'json',			
			}).done(function(data){
				_g.daoCuentasBanco.getTableBE();
				_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
			}).fail(function(data){
				_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
			});
		}

	};

	var functionEjercicios = function() {

		_g.listas.getCatMonedas();
		_g.listas.getCatBancos();
		_g.listas.getEmpresasId($('#id_empresas_cuentas_bancarias'));

		$("#fecha_be").datepicker({ 
			dateFormat: 'yy-mm-dd',
			language: "es" 
		});

		$('#btnNuevaCuentaBancaria').click(function(){
			if($('#id_empresa_ejercicio').val() != '0'){
				$('#frmBancosEmpresas').show('slow');				
				$('#btnNuevaCuentaBancaria, #tbCuentasBanco').hide();
			}else{
				$('#frmBancosEmpresas').show('slow');				
				$('#cargandoInfoCuentasBanco, #tbCuentasBanco').hide();
			}
		});

		$("#id_empresas_cuentas_bancarias").change(function (event){
			if($('#id_empresas_cuentas_bancarias').val() != 0){
				$('#id_empresa_cuentas_b').val($('#id_empresas_cuentas_bancarias').val());
				_g.listas.getEmpresasSucursalesId($("#id_empresas_cuentas_bancarias").val(), $("#id_sucursal_be"));
				_g.listas.getCatCuentasContableAfectablesCuztom($('#id_empresas_cuentas_bancarias').val(),$('#id_cuenta_contable_be'));
				_g.daoCuentasBanco.getTableBE();
				$('#btnNuevaCuentaBancaria').show();
			}else{
				$('#cargandoInfoCuentasBanco').show();
				$('#btnNuevaCuentaBancaria, #tbCuentasBanco, #frmBancosEmpresas').hide();
			}
		});

		$("#id_sucursal_be").change(function (event){
			if($('#id_sucursal_be').val() != 0){
				$('#id_sucursal_b').val($('#id_sucursal_be').val());
				_g.daoCuentasBanco.getTableBE();
				$('#btnNuevaCuentaBancaria').show();
			}else{
				_g.daoCuentasBanco.getTableBE();				
			}
		});

		$('#btnAddBE').click(function(e){
			e.preventDefault();
			if($('#frmBancosEmpresas').valid()){
				if($('#id_moneda').val() == '101'){
					$.ajax({
					    type        : 'POST',
					    url         : '/api_cont/bancos_empresas',
					    data        : $('#frmBancosEmpresas').serializeObject(),
					    dataType    : 'json' 
					}).done(function(data) {
						_g.daoCuentasBanco.getTableBE();
						$('#num_cuenta_be, #saldo_inicial_be, #fecha_be').val('');
						$('#id_moneda').select2().select2("val",'101');
						$('#id_banco').select2().select2("val",'0');
						$('#id_empresa_be').select2().select2("val",'0');
						$('#id_sucursal_be').select2().select2("val",'0');
						$('#id_cuenta_contable').select2().select2("val",'0');
						_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
					});					
				}else{
					if($('#id_cuenta_complementaria_be').val() != 0){
						$.ajax({
						    type        : 'POST',
						    url         : '/api_cont/bancos_empresas',
						    data        : $('#frmBancosEmpresas').serializeObject(),
						    dataType    : 'json' 
						}).done(function(data) {
							_g.daoCuentasBanco.getTableBE();
							$('#num_cuenta_be, #saldo_inicial_be, #fecha_be').val('');
							$('#id_moneda').select2().select2("val",'101');
							$('#id_banco').select2().select2("val",'0');
							$('#id_empresa_be').select2().select2("val",'0');
							$('#id_sucursal_be').select2().select2("val",'0');
							$('#id_cuenta_contable').select2().select2("val",'0');
							_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
						});
					}else{
						_gen.notificacion_min('Aviso', 'Es necesario seleccionar una cuenta complementaria, ya que el tipo de cambio es diferente a Pesos Mexicanos',4);
					}
				}
			}else{
				_gen.notificacion_min('Aviso', 'Es necesario llenar la informaci&oacute;n',4);
			}
		});

	};
	
	functionEjercicios();
	$(document).ready(function(){
	 	$("#frmBancosEmpresas").validate({
			rules:{
				id_banco : {
					required : true,
					valueNotEquals : "0",
				},
				id_moneda : {
					required : true,
					valueNotEquals : "0",
				},
				num_cuenta : {
					required : true,
					number : true
				},
				id_cuenta_contable : {
					required : true,
					valueNotEquals : "0",
				},
				saldo_inicial : {
					required : true,
					number : true
				},
				fecha : {
					required : true
				}
			},
			messages : {
				id_banco : {
					required : "Es obligatorio llenar los datos",
					valueNotEquals : "Es obligatorio seleccionar una opcion",
				},
				id_moneda : {
					required : "Es obligatorio llenar los datos",
					valueNotEquals : "Es obligatorio seleccionar una opcion",
				},
				num_cuenta : {
					required : "Es obligatorio llenar los datos",
					number : "Solo se aceptan digitos"
				},
				id_cuenta_contable : {
					required : "Es obligatorio llenar los datos",
					valueNotEquals : "Es obligatorio seleccionar una opcion",
				},
				saldo_inicial : {
					required : "Es obligatorio llenar los datos",
					number : "Solo se aceptan digitos"
				},
				fecha : {
					required : "Es obligatorio llenar los datos",
				}
			}
		});
	});
*/

</script>