_g.dao = {
	getEstaciones :function(){
		$.ajax({
			url: '/api_admin/sucursales',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				//$('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				$.each(data, function(i) {					
					if(data[i].estatus == 1){
					 	data[i].label_estatus = '<span class="label label-success">Disponible</span>';
					}if(data[i].estatus == 2){
					 	data[i].label_estatus = '<span class="label label-warning">Mantenimiento</span>';
					}if(data[i].estatus == 3){
					 	data[i].label_estatus = '<span class="label label-danger">Fuera de Servicio</span>';
					}
				});
				var datelist = data;var table = $('#tblDataSucursales');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
				    	          {"aTargets" : [ 2 ], "mData" : "direccion"},
				    	          {"aTargets" : [ 3 ], "mData" : "telefono"},
				    	          {"aTargets" : [ 4 ], "mData" : "estado"},
				    	          {"aTargets" : [ 5 ], "mData" : "ciudad"},
				    	          {"aTargets" : [ 6 ], "mData" : "encargado"},
				    	          {"aTargets" : [ 7 ], "mData" : "label_estatus"},
				    	          {
									"aTargets": [ 8 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" href=/#admin/estaciones/editar/' + o.id + '>' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'
											  +'<a class="btn btn-sm btn-danger" onclick="_g.dao.deleteEstaciones(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>'; 
									}
								  }];
				_gen.setTable(table,columnDefs,datelist);			
			}
		});
	},
	deleteEstaciones : function(id){
		$.ajax({
			url: '/api_admin/sucursales/'+id,
			type: 'DELETE',
			dataType: 'json',
			success: function(data){
				_g.dao.getEstaciones();			
				_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
			}
		});					
	},
};