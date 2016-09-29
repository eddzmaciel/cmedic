_g.dao = {
	getEmpBeneficiencias :function(){
		$.ajax({
			url: '/api_admin/empresas_beneficiencias',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				// $('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				$.each(data, function(i) {					
					if(data[i].estatus == 1){
					 	data[i].label_estatus = '<span class="label label-success">Activo</span>';
					}if(data[i].estatus == 2 || data[i].estatus == 3){
					 	data[i].label_estatus = '<span class="label label-warning">Proceso</span>';
					}if(data[i].estatus == 4){
					 	data[i].label_estatus = '<span class="label label-danger">Inactivo</span>';
					}
				});
				var datelist = data;var table = $('#tblDataEmpresasBeneficiencias');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
				    	          {"aTargets" : [ 2 ], "mData" : "razon_social"},
				    	          {"aTargets" : [ 3 ], "mData" : "telefono"},
				    	          {"aTargets" : [ 4 ], "mData" : "responsable"},
				    	          {"aTargets" : [ 5 ], "mData" : "email"},
				    	          {"aTargets" : [ 6 ], "mData" : "direccion"},
				    	          {"aTargets" : [ 7 ], "mData" : "credito_asignado"},
				    	          {"aTargets" : [ 8 ], "mData" : "costo_sesion"},
				    	          {"aTargets" : [ 9 ], "mData" : "label_estatus"},
				    	          {
									"aTargets": [ 10 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" href=/#admin/empresas_beneficiencia/editar/' + o.id + '>' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'
											  +'<a class="btn btn-sm btn-danger" onclick="_g.dao.delete(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>'; 
									}
								  }];
				_gen.setTable(table,columnDefs,datelist);			
			}
		});
	},
	delete : function(id){
		$.ajax({
			url: '/api_admin/empresas_beneficiencias/'+id,
			type: 'DELETE',
			dataType: 'json',
			success: function(data){
				_g.dao.getEmpBeneficiencias();			
				_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
			}
		});
	},
};