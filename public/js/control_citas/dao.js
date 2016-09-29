_g.dao = {
	getListadoCitas :function(sucursal){
			var url = '/api_admin/agenda';
		if(sucursal != 0){ url = '/api_admin/agenda_sucursal/'+sucursal; }
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
						
						if(data.pacientes[i].estatus == 1){
						 	data.pacientes[i].label_estatus = '<span class="label label-info">AUSENTE</span>';
						}if(data.pacientes[i].estatus == 2){
						 	data.pacientes[i].label_estatus = '<span class="label label-warning">CONFIRMADO</span>';
						}if(data.pacientes[i].estatus == 3){
						 	data.pacientes[i].label_estatus = '<span class="label label-danger">CANCELADO</span>';
						}if(data.pacientes[i].estatus == 5){
						 	data.pacientes[i].label_estatus = '<span class="label label-success">FINALIZADO</span>';
						}
						if(data.pacientes[i].foto != ''){
							data.pacientes[i].foto = "<img src='/uploads/pacientes/"+data.pacientes[i].foto+"' class='away' style='width: 40px;'>";
						}else{
							data.pacientes[i].foto = "<img src='/img/paciente.png' class='away' style='width: 40px;'>";
						}
					});
					var datelist = data.pacientes;var table = $('#tblDataListadoCitas');
					var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_paciente"},
									  {
										"aTargets": [ 1 ],
										"mData": null,
										"mRender": function (o) {										 
											return  o.foto; 
										}
									  },
					    	          {"aTargets" : [ 2 ], "mData" : "nombre"},
					    	          {"aTargets" : [ 3 ], "mData" : "hora"},
					    	          {"aTargets" : [ 4 ], "mData" : "tipo_paciente"},
					    	          {"aTargets" : [ 5 ], "mData" : "hora_entrada"},
					    	          {"aTargets" : [ 6 ], "mData" : "hora_salida"},
					    	          {"aTargets" : [ 7 ], "mData" : "label_estatus"},
					    	          {
										"aTargets": [ 8 ],
										"mData": null,
										"mRender": function (o) { 
											return '<a class="btn btn-sm btn-info" data-original-title="No se" onclick="_g.dao.getObservacion(' + o.id_paciente + ')">' + '<i class="glyphicon glyphicon-comment"></i></a>&nbsp;' 
												  +'<a class="btn btn-sm btn-danger" data-original-title="Cancelar cita" onclick="_g.dao.getCancelarCita(' + o.id_paciente +','+ o.estatus + ')">' + '<i class="glyphicon glyphicon-remove"></i></a>&nbsp;'
												  +'<a class="btn btn-sm btn-default" data-original-title="Informacion del paciente" onclick="_g.dao.getInformacion(' + o.id_paciente + ')">' + '<i class="glyphicon glyphicon-search"></i></a>&nbsp;'
												  +'<a class="btn btn-sm btn-success" data-original-title="Confirmar cita"  onclick="_g.dao.getConfirmarCita(' + o.id_paciente +','+ o.estatus + ')">' + '<i class="glyphicon glyphicon-ok"></i></a>'; 
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

	getObservacion : function(id){
		if(id != null){
			$('#id_paciente_observacion').val(id);
			$.ajax({
				url: '/api_admin/agenda/'+id,
				type: 'GET',
			}).done(function (data){
				$('#nombre_paciente_observaciones').val('');
				$('#rep_observacion').val('');
				$('#nombre_paciente_observaciones').val(data[0].nombre+" "+data[0].paterno+" "+data[0].materno);
				$('#observacionesModal').modal();				
			}).fail(function (data){
				_gen.notificacion_min('Aviso', 'Al parecer hubo un problema con el servidor',4);				
			});
		}else{
			_gen.notificacion_min('Aviso', 'Es necesario seleccionar un paciente',4);							
		}
	},

	getInformacion : function(id){
		if(id != null){
			localStorage["id_paciente"] = id;
			window.location.href='/#admin/pacientes/info';
		}else{
			_gen.notificacion('Aviso', 'Es necesario seleccionar un paciente',4);
		}
	},

	getCancelarCita : function(id, estatus){
		if(id != null){
			if(estatus == 1){				
				$('#id_paciente_cancelar').val(id);
				$.ajax({
					url: '/api_admin/agenda/'+id,
					type: 'GET',
				}).done(function (data){
					$('#nombre_paciente_cancelar').val('');
					$('#estatus').val(data[0].estatus);
					$('#nombre_paciente_cancelar').val(data[0].nombre+" "+data[0].paterno+" "+data[0].materno);
					$('#CancelarModal').modal();			
				}).fail(function (data){
					_gen.notificacion_min('Aviso', 'Al parecer hubo un problema con el servidor',4);				
				});
			}else{
				_gen.notificacion_min('Aviso', 'No se puede modificar la cita en el estatus que se encuentra, si requiere de una modificacion consulte al administrador',4);
			}
		}else{
			_gen.notificacion_min('Aviso', 'Es necesario seleccionar un paciente',4);
		}

	},

	getConfirmarCita : function(id, estatus){
		if(id != null){
			if(estatus == 1){
				$('#id_paciente_confirmar').val(id);
				$.ajax({
					url: '/api_admin/agenda/'+id,
					type: 'GET',
				}).done(function (data){				
					$('#estatus_confirmar').val(data[0].estatus);
					$('#nombre_paciente_confirmacion').val('');
					$('#nombre_paciente_confirmacion').val(data[0].nombre+" "+data[0].paterno+" "+data[0].materno);
					$('#ConfirmarModal').modal();
				}).fail(function (data){
					_gen.notificacion_min('Aviso', 'Al parecer hubo un problema con el servidor',4);				
				});
			}else{
				_gen.notificacion_min('Aviso', 'No se puede modificar la cita en el estatus que se encuentra, si requiere de una modificacion consulte al administrador',4);
			}
		}else{
			_gen.notificacion_min('Aviso', 'Es necesario seleccionar un paciente',4);							
		}
	},
};