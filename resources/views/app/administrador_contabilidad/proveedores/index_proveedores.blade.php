<!-- <div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Catalogo 
			<span>> 
				Clientes
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5 id="total"></h5>
			</li>			
		</ul>
	</div>
</div> -->
<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WdtUsuarios">
			<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Listado de Proveedores</h2>
				</header>
				<div>

					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">						
						<div class="widget-body-toolbar" id="btnGroupButton" style="padding-bottom:0px;">
							<div class="row">
								<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
									<form class="smart-form">
										<div class="row">
											<section class="col col-6">
												<label class="select">
													<select class="form-control select2" name="id_empresa" id="id_empresa" style="border: 0px solid #ccc;height: 32px;padding: 0;">
														<option value="1">Seleccione Empresa</option>
													</select> <i></i> </label>								
											</section>
											<section class="col col-6">
												<label class="select">
													<select class="form-control" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
														<option value="">Seleccione una empresa</option>
													</select> <i></i> </label>
											</section>
										</div>
									</form>
								</div>
								<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
									<button class="btn btn-labeled btn-primary" type="button" onclick="window.location.href='/#contabilidad/proveedores/nuevo'">
										<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
										Nuevo Proveedor
									</button>
									<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
										<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
										Modificar
									</button>
									<button class="btn btn-labeled btn-warning" type="button" onclick="window.location.href='/#contabilidad/proveedores/importacion'">
										<span class="btn-label"><i class="glyphicon glyphicon-upload"></i></span>
										Clientes XML
									</button>									
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table id="tblData" class="table table-hover table-striped" width="100%">
								<thead>
									<tr>
										<th data-class="expand">Id</th>
										<th data-hide="phone">Nombre</th>
										<th data-hide="phone">Limite credito</th>
										<th data-hide="phone">Saldo</th>
										<th data-hide="phone">Saldo corriente</th>
										<th data-hide="phone">Saldo vencido</th>
										<th data-hide="phone">Telefono</th>
										<th data-hide="phone">Contacto</th>
										<th data-hide="phone">Email</th>
										<th data-hide="phone">Estatus</th>
										<th width="85px">Acciones</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		_g.listas.getEmpresas();
		_g.dao.getProveedores();
		$('#id_sucursal').select2();
		$("#id_empresa").change(function(event) {
			_g.listas.getEmpresasSucursales();
		});
	};

	_g.dao = {
		getProveedores :function(){
			$.ajax({
				url: '/api_cont/proveedores',
				type: 'GET',
				dataType: 'json',
				success: function(data){
					if(data.length != 0){
						var datelist = data;var table = $('#tblData');
						var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
						    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
						    	          {"aTargets" : [ 2 ], "mData" : "id"},
						    	          {"aTargets" : [ 3 ], "mData" : "id"},
						    	          {"aTargets" : [ 4 ], "mData" : "id"},
						    	          {"aTargets" : [ 5 ], "mData" : "id"},
						    	          {"aTargets" : [ 6 ], "mData" : "id"},
						    	          {"aTargets" : [ 7 ], "mData" : "id"},
						    	          {"aTargets" : [ 8 ], "mData" : "email_uno"},
						    	          {"aTargets" : [ 9 ], "mData" : "id"},
						    	          {
											"aTargets": [ 10 ],
											"mData": null,
											"mRender": function (o) { 
												return '<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarProveedores(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
											}
										  }];
						_gen.setTableNE(table,columnDefs,datelist);
					}else{
						$('#tblData').dataTable();
						_gen.notificacion_min('Error', 'No se encontraron registros con error',4);
					}
				}
			});
		},
		getProveedoresSucursal :function(sucursal){
			$.ajax({
				url: '/api_cont/proveedores/'+sucursal,
				type: 'GET',
				dataType: 'json',
				success: function(data){
					if(data.length != 0){
						var datelist = data;var table = $('#tblData');
						var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
						    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
						    	          {"aTargets" : [ 2 ], "mData" : "id"},
						    	          {"aTargets" : [ 3 ], "mData" : "id"},
						    	          {"aTargets" : [ 4 ], "mData" : "id"},
						    	          {"aTargets" : [ 5 ], "mData" : "id"},
						    	          {"aTargets" : [ 6 ], "mData" : "telefono"},
						    	          {"aTargets" : [ 7 ], "mData" : "id"},
						    	          {"aTargets" : [ 8 ], "mData" : "email_uno"},
						    	          {"aTargets" : [ 9 ], "mData" : "id"},
						    	          {
											"aTargets": [ 10 ],
											"mData": null,
											"mRender": function (o) { 
												return '<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarClientes(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
											}
										  }];
						_gen.setTableNE(table,columnDefs,datelist);
					}else{
						$('#tblData').dataTable();
						_gen.notificacion_min('Error', 'No se encontraron registros con error',4);
					}
				}
			});
		},		
		getEliminarProveedores :function(id){
			$.ajax({
				url: '/api_cont/proveedores/'+id,
				type: 'DELETE',
				dataType: 'json',			
			}).done(function(data){
				_g.dao.getClientes();
				_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
			}).fail(function(data){
				_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
			});
		},
	};
	pagefunction();
</script>
