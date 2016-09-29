<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WdtUsuarios">
			<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Listado de Empleados</h2>
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
									<button class="btn btn-labeled btn-primary" type="button" onclick="window.location.href='/#contabilidad/empleados/nuevo'">
										<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
										Nuevo Empleado
									</button>
									<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
										<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
										Modificar
									</button>
									<button class="btn btn-labeled btn-warning" type="button" onclick="window.location.href='/#contabilidad/empleados/importacion'">
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
		_g.dao.getEmpleados();
		$('#id_sucursal').select2();
		$("#id_empresa").change(function(event) {
			_g.listas.getEmpresasSucursales();
		});
		$("#id_sucursal").change(function(event) {
			_g.dao.getEmpleadosSucursal($("#id_sucursal").val());
		});
	};

	_g.dao = {
		getEmpleados :function(){
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
												return '<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarEmpleados(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
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
		getEmpleadosSucursal :function(sucursal){
			$.ajax({
				url: '/api_cont/empleados/'+sucursal,
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
												return '<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarEmpleados(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'; 
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
		getEliminarEmpleados :function(id){
			$.ajax({
				url: '/api_cont/empleados/'+id,
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
