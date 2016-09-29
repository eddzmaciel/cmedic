_g.dao = {
	getListadoSesiones :function(sucursal){
			var url = '/api/app_citas';
		//if(sucursal != 0){ url = '/api_admin/historial_citas_sucursal/'+sucursal; }
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				//$('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				if(data.pacientes.length != 0){
					$.each(data.pacientes, function(i) {					
						if(data.pacientes[i].tipo_paciente == 1){
							data.pacientes[i].tipo_paciente = 'Beneficiencia';
						}if(data.pacientes[i].tipo_paciente == 2){
							data.pacientes[i].tipo_paciente = 'Regular';
						}
						data.pacientes[i].hora_entrada = '<i class="fa fa-clock-o"></i> '+data.pacientes[i].hora_entrada;
						data.pacientes[i].hora_salida = '<i class="fa fa-clock-o"></i> '+data.pacientes[i].hora_salida;
						
						if(data.pacientes[i].estatus_cita == 1){
						 	data.pacientes[i].label_estatus = '<span class="label label-info">EN ESPERA</span>';
						}if(data.pacientes[i].estatus_cita == 2){
						 	data.pacientes[i].label_estatus = '<span class="label label-warning">EN SESION</span>';
						}if(data.pacientes[i].estatus_cita == 3){
						 	data.pacientes[i].label_estatus = '<span class="label label-danger">FINALIZADO</span>';
						}if(data.pacientes[i].estatus_cita == 4){
						 	data.pacientes[i].label_estatus = '<span class="label label-danger">CANCELADO</span>';
						}if(data.pacientes[i].estatus_cita == 5){
						 	data.pacientes[i].label_estatus = '<span class="label label-success">EN PROCESO</span>';
						}

						if(data.pacientes[i].estatus_factura == 1){
						 	data.pacientes[i].label_estatus_factura = '<span class="label label-success">SIN FACTURAR</span>';
						}if(data.pacientes[i].estatus_factura == 2){
						 	data.pacientes[i].label_estatus_factura = '<span class="label label-warning">FACTURADO NO PAGADO</span>';
						}if(data.pacientes[i].estatus_factura == 3){
						 	data.pacientes[i].label_estatus_factura = '<span class="label label-info">FACTURADO PAGADO</span>';
						}if(data.pacientes[i].estatus_factura == 4){
						 	data.pacientes[i].label_estatus_factura = '<span class="label label-danger">CANCELADO</span>';
						}


						if(data.pacientes[i].foto != ''){
							data.pacientes[i].foto = "<img src='/uploads/pacientes/"+data.pacientes[i].foto+"' class='away' style='width: 40px;'>";
						}else{
							data.pacientes[i].foto = "<img src='/img/paciente.png' class='away' style='width: 40px;'>";
						}
					});
					console.log(data);
					var datelist = data.pacientes;
					var table = $('#tblDataListadoSesiones');
					var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_paciente"},
									  {
										"aTargets": [ 1 ],
										"mData": null,
										"mRender": function (o) {										 
											return  o.foto; 
										}
									  },
					    	          {"aTargets" : [ 2 ], "mData" : "nombre"},
					    	          {"aTargets" : [ 3 ], "mData" : "fecha_cita"},
					    	          {"aTargets" : [ 4 ], "mData" : "tipo_paciente"},
					    	          {"aTargets" : [ 5 ], "mData" : "hora_entrada"},
					    	          {"aTargets" : [ 6 ], "mData" : "hora_salida"},
					    	          {"aTargets" : [ 7 ], "mData" : "id_estacion"},
					    	          {"aTargets" : [ 8 ], "mData" : "label_estatus"},
					    	          {
										"aTargets": [ 9 ],
										"mData": null,
										"mRender": function (o) { 
											return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
										}
									  }];
					_gen.setTable(table,columnDefs,datelist);
					//_gen.selectRowsTable(table);
					$('#id_paciente').val('');								
				}else{
					_gen.notificacion_min('Aviso', 'Al parecer no se encontraron registros de esta sucursal',4);									
				}
			}
		});
	},

	getSeleccionarPaciente : function(id_paciente, id_cita){
		if(id_paciente != null && id_cita != null){
			console.log(id_cita);
			console.log(id_paciente);
			localStorage["id_paciente"] = id_paciente;
			localStorage["id_cita"] = id_cita;
			_gen.notificacion_min('&Eacute;xito', 'Se ha seleccionado un usuario exitosamente',1);
		}else{
			_gen.notificacion_min('Aviso', 'Es necesario seleccionar un paciente',4);							
		}
	},

};