_g.dao = {
	getPacientes :function(){
		$.ajax({
			url: '/api_admin/pacientes',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('#total_pacientes').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				$.each(data.pacientes, function(i) {					
					if(data.pacientes[i].estatus == 1){
					 	data.pacientes[i].label_estatus = '<span class="label label-success">Disponible</span>';
					}if(data.pacientes[i].estatus == 2){
					 	data.pacientes[i].label_estatus = '<span class="label label-warning">Ausente</span>';
					}if(data.pacientes[i].estatus == 3){
					 	data.pacientes[i].label_estatus = '<span class="label label-danger">Baja</span>';
					}

					if(data.pacientes[i].tipo_paciente == 1){
					 	data.pacientes[i].label_tipo_paciente = '<span class="label label-default"><i class="fa fa-lg fa-fw fa-building"></i> Beneficiencia</span>';
					}if(data.pacientes[i].tipo_paciente == 2){
					 	data.pacientes[i].label_tipo_paciente = '<span class="label label-success"><i class="fa fa-lg fa-fw fa-money"></i> Regular</span>';
					}
					if(data.pacientes[i].foto != ''){
						data.pacientes[i].foto = "<img src='/uploads/pacientes/"+data.pacientes[i].foto+"' class='away' style='width: 40px;'>";
					}else{
						data.pacientes[i].foto = "<img src='/img/paciente.png' class='away' style='width: 40px;'>";
					}
				});
				var datelist = data.pacientes;var table = $('#tblDataPacientes');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
								  {
									"aTargets": [ 1 ],
									"mData": null,
									"mRender": function (o) {										 
										return  o.foto; 
									}
								  },
				    	          {"aTargets" : [ 2 ], "mData" : "nombre_completo"},
				    	          {"aTargets" : [ 3 ], "mData" : "expediente_uhg"},
				    	          {"aTargets" : [ 4 ], "mData" : "label_tipo_paciente"},
				    	          {"aTargets" : [ 5 ], "mData" : "label_estatus"},
				    	          {
									"aTargets": [ 6 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" href=/#admin/pacientes/editar/' + o.id + '>' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'
											  +'<a class="btn btn-sm btn-default" href=/#admin/citas/editar/' + o.id + '>' + '<i class="glyphicon glyphicon-calendar"></i></a>&nbsp;'
											  +'<a class="btn btn-sm btn-danger" onclick="_g.dao.getConfirmarBaja(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>&nbsp;'
											  +'<a class="btn btn-sm btn-warning" href=/#admin/pacientes/historial_medico/editar/' + o.id + '>' + '<i class="glyphicon glyphicon-list-alt"></i></a>'; 
									}
								  }];
				_gen.setTable(table,columnDefs,datelist);
				//_gen.selectRowsTable(table);			
			}
		});
	},
	getObservaciones :function(){
		$.ajax({
			url: '/api_admin/observaciones/'+localStorage["id_paciente"],
			type: 'GET',
			dataType: 'json',
			success: function(data){				
				var datelist = data;var table = $('#tblDataObservaciones');
				//table.dataTable().destroy();
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "id_users"},
				    	          {"aTargets" : [ 2 ], "mData" : "observacion"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);			
			}
		});
	},
	getIncidencias :function(){
		$.ajax({
			url: '/api_admin/incidencias/'+localStorage["id_paciente"],
			type: 'GET',
			dataType: 'json',
			success: function(data){				
				var datelist = data;var table = $('#tblDataIncidencias');
				table.dataTable().destroy();
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "id_users"},
				    	          {"aTargets" : [ 2 ], "mData" : "incidencia"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);			
			}
		});
	},
	getPacienteId :function(){
		if(localStorage["id_paciente"] != ""){
			$.ajax({
				url: '/api_admin/pacientes/'+localStorage["id_paciente"],
				type: 'GET',
				dataType: 'json',
				success: function(data){
					if(data.foto != ""){					
						$("#foto_paciente").attr("src","/uploads/pacientes/"+data.foto);					
					}else{
						$("#foto_paciente").attr("src",'/img/paciente.png');	
					}
					$('#nombre_paciente').append('<h1>'+data.nombre+' '+data.paterno+' '+data.materno+'<br><small> '+data.expediente_uhg+'</small></h1>');
					$('#info_paciente_basica').append('<tr><td><i class="fa fa-envelope"></i>&nbsp;&nbsp; Email</td><td> '+data.email+'</td></tr>'+
													  '<tr><td><i class="fa fa-phone"></i>&nbsp;&nbsp; Telefono</td><td> '+data.da_celular+'</td></tr>'+												  
													  '<tr><td> Contacto</td><td> '+data.contacto_nombre+'</td></tr>'+
													  '<tr><td> Telefono Contacto</td><td> '+data.contacto_telefono+'</td></tr>'+
													  '<tr><td> Parentesco</td><td> '+data.contacto_parentesco+'</td></tr>');
					
					$('#info_paciente_detalle').append('<tr><td> Sexo</td><td> '+data.sexo+'</td></tr>'+
													  '<tr><td> Edad</td><td> '+data.edad+'</td></tr>'+
													  '<tr><td> Ciudad de nacimiento</td><td> '+data.ln_ciudad+'</td></tr>'+
													  '<tr><td> Estado de nacimiento</td><td> '+data.ln_estado+'</td></tr>'+
													  '<tr><td> Fecha de nacimiento</td><td> '+data.fecha_nacimiento+'</td></tr>'+
													  '<tr><td> Ocupacion</td><td> '+data.ocupacion+'</td></tr>'+
													  '<tr><td> Escolaridad</td><td> '+data.escolaridad+'</td></tr>'+
													  '<tr><td> Religion</td><td> '+data.religion+'</td></tr>'+
													  '<tr><td> Direccion Actual</td><td> '+data.da_direccion+'</td></tr>'+
													  '<tr><td> Colonia</td><td> '+data.da_colonia+'</td></tr>'+
													  '<tr><td> Codigo Postal</td><td> '+data.da_codigo_postal+'</td></tr>'+
													  '<tr><td> Ciudad</td><td> '+data.da_ciudad+'</td></tr>'+
													  '<tr><td> Estado</td><td> '+data.da_estado+'</td></tr>'+
													  '<tr><td> Telefono</td><td> '+data.da_telefono+'</td></tr>'+
													  '<tr><td> Celular</td><td> '+data.da_celular+'</td></tr>');
				}
			});
		}else{
			window.history.back();
		}
	},
	getDetallePaciente :function(){
		if(localStorage["id_paciente"] != ""){
			$.ajax({
				url: '/api_admin/historial_medico/'+localStorage["id_paciente"],
				type: 'GET',
				dataType: 'json',
				success: function(data){
					if(data.tuberculosis == 1){data.tuberculosis = "Si";}else{data.tuberculosis = "No";}
					if(data.diabetes_mellitus == 1){data.diabetes_mellitus = "Si";}else{data.diabetes_mellitus = "No";}
					if(data.hipertension == 1){data.hipertension = "Si";}else{data.hipertension = "No";}
					if(data.carcinomas == 1){data.carcinomas = "Si";}else{data.carcinomas = "No";}
					if(data.cardiopatias == 1){data.cardiopatias = "Si";}else{data.cardiopatias = "No";}
					if(data.hepatopatias == 1){data.hepatopatias = "Si";}else{data.hepatopatias = "No";}
					if(data.nefropatias == 1){data.nefropatias = "Si";}else{data.nefropatias = "No";}
					if(data.enf_endocrinas == 1){data.enf_endocrinas = "Si";}else{data.enf_endocrinas = "No";}
					if(data.enf_mentales == 1){data.enf_mentales = "Si";}else{data.enf_mentales = "No";}
					if(data.epilepsia == 1){data.epilepsia = "Si";}else{data.epilepsia = "No";}
					if(data.asma == 1){data.asma = "Si";}else{data.asma = "No";}
					if(data.enf_hematologicas == 1){data.enf_hematologicas = "Si";}else{data.enf_hematologicas = "No";}
					if(data.sifilis == 1){data.sifilis = "Si";}else{data.sifilis = "No";}
					$('#info_d1').append('<tr><td>Tuberculosis</td><td> '+data.tuberculosis+'</td></tr>'+
										  '<tr><td>Diabetes Mellitus</td><td> '+data.diabetes_mellitus+'</td></tr>'+
										  '<tr><td>Hipertensión</td><td> '+data.hipertension+'</td></tr>'+
										  '<tr><td>Carcinomas</td><td> '+data.carcinomas+'</td></tr>'+
										  '<tr><td>Cardiopatías</td><td> '+data.cardiopatias+'</td></tr>'+
										  '<tr><td>Hepatopatías</td><td> '+data.hepatopatias+'</td></tr>'+
										  '<tr><td>Hepatopatías</td><td> '+data.nefropatias+'</td></tr>'+
										  '<tr><td>Enf. Endocrinas</td><td> '+data.enf_endocrinas+'</td></tr>'+
										  '<tr><td>Enf. Mentales</td><td> '+data.enf_mentales+'</td></tr>'+
										  '<tr><td>Epilepsia</td><td> '+data.epilepsia+'</td></tr>'+
										  '<tr><td>Asma</td><td> '+data.asma+'</td></tr>'+
										  '<tr><td>Enf. Hematológicas</td><td> '+data.enf_hematologicas+'</td></tr>'+
										  '<tr><td>Sífilis</td><td> '+data.sifilis+'</td></tr>'+
										  '<tr><td>Otros</td><td> '+data.otros+'</td></tr>'+
										  '<tr><td>Etiología y edades de Morbimortalidad </td><td> '+data.etiologia_y_edades_de_morbimortalidad+'</td></tr>');
					
					$('#info_d2').append('<tr><td>Enf. Infecciosas de la infancia</td><td> '+data.enf_infecciosas_de_la_infancia+'</td></tr>'+
										  '<tr><td>Tb, Enf. Venéreas</td><td> '+data.enf_Venereas+'</td></tr>'+
										  '<tr><td>Intervenciones Quirúrgicas </td><td> '+data.intervenciones_quirurgicas+'</td></tr>'+
										  '<tr><td>Hospitalizaciones</td><td> '+data.hospitalizaciones+'</td></tr>'+
										  '<tr><td>Traumatismos</td><td> '+data.traumatismos+'</td></tr>'+
										  '<tr><td>Perdida del Conocimiento</td><td> '+data.perdida_conocimiento+'</td></tr>'+
										  '<tr><td>Intolerancia a Medicamentos</td><td> '+data.intolerancia_medicamentos+'</td></tr>'+
										  '<tr><td>Transfusiones </td><td> '+data.transfuciones+'</td></tr>'+
										  '<tr><td>Notas Adicionales </td><td> '+data.notas_adicionales+'</td></tr>');
				}
			});
		}else{
			window.history.back();
		}
	},

	getConfirmarBaja : function(id, estatus){
		if(id != null){
			if(estatus != 3){
				$('#id_paciente_baja').val(id);
				$('#estatus_baja').val(estatus);
				$.ajax({
					url: '/api_admin/agenda/'+id,
					type: 'GET',
				}).done(function (data){
					$('#motivo').select2();
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