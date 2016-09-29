_g.dao = {
	getUsuarios :function(){
		$.ajax({
			url: '/api_admin/usuarios',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('#total_usuarios').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				$('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				$('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				var datelist = data.usuarios;var table = $('#tblDataUsuarios');
				$.each(data.usuarios, function(i) {					
					if(data.usuarios[i].estatus == 0){
					 	data.usuarios[i].label_estatus = '<span class="label label-success">Disponible</span>';
					}if(data.usuarios[i].estatus == 1){
					 	data.usuarios[i].label_estatus = '<span class="label label-danger">No disponible</span>';
					}if(data.usuarios[i].estatus == 2){
					 	data.usuarios[i].label_estatus = '<span class="label label-danger">Eliminado</span>';
					}
				});
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
								  {
									"aTargets": [ 1 ],
									"mData": null,
									"mRender": function (o) {										 
										return '<img class="avatar" style="width:40px;" src="/uploads/avatares/' + o.avatar + '" alt="foto">'; 
									}
								  },
				    	          {"aTargets" : [ 2 ], "mData" : "name"},
				    	          {"aTargets" : [ 3 ], "mData" : "email"},
				    	          {"aTargets" : [ 4 ], "mData" : "telefono"},
				    	          {"aTargets" : [ 5 ], "mData" : "direccion"},
				    	          {"aTargets" : [ 6 ], "mData" : "label_estatus"},
				    	          {
									"aTargets": [ 7 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" href=/#admin/usuarios/editar/' + o.id + '>' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'
											  +'<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarUsuarios(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>'; 
									}
								  }];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);	
			}
		});
	},
	getEliminarUsuarios :function(id){
		$.SmartMessageBox({
			title : 'Confirmar cambio de estatus',
			content : 'Porfavor confirme que desea cambiar el estatus del usuario',
			buttons : '[No][Cambiar]'
		}, function(btn) {
			if (btn === "Cambiar") {					
				$.ajax({
					url: '/api_admin/usuarios/'+id,
					type: 'DELETE',
					dataType: 'json',			
				}).done(function(data){
					_g.dao.getUsuarios();
					_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
				}).fail(function(data){
					_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
				});
			}
		});
	},
};