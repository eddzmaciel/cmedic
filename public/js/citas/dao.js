_g.dao = {
	getCitas :function(){
		$.ajax({
			url: '/api_admin/citas',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				$('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total_inactivas+'</span>');
				$.each(data.citas, function(i) {					
					if(data.citas[i].estatus_cita == 1){
					 	data.citas[i].label_estatus = '<span class="label label-success">Activo</span>';
					}if(data.citas[i].estatus_cita == 2 || data.citas[i].estatus_cita == 3){
					 	data.citas[i].label_estatus = '<span class="label label-warning">Proceso</span>';
					}if(data.citas[i].estatus_cita == 4){
					 	data.citas[i].label_estatus = '<span class="label label-danger">Inactivo</span>';
					}
				});
				var datelist = data.citas;var table = $('#tblDataCitas');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita"},
				    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
				    	          {"aTargets" : [ 2 ], "mData" : "dia"},
				    	          {"aTargets" : [ 3 ], "mData" : "hora"},
				    	          {"aTargets" : [ 4 ], "mData" : "label_estatus"},
				    	          {
									"aTargets": [ 5 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" href=/#admin/citas/editar/' + o.id_cita + '>' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'
											  +'<a class="btn btn-sm btn-danger" onclick="_g.dao.deleteCitas(' + o.id_cita + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>'; 
									}
								  }];
				_gen.setTable(table,columnDefs,datelist);			
			}
		});
	},
	updateCitas : function(){
		if(_g.currentDates['id'] != ""){
			$.ajax({
				url: '/api_admin/citas/'+_g.currentDates['id'],
				data: $('#frmCitas').serializeObject(),
				type: 'PUT',
				success: function(data){
					_g.dao.getCitas();			
					_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
				}
			});					
		}
	},
	deleteCitas : function(id){
		$.ajax({
			url: '/api_admin/citas/'+id,
			type: 'DELETE',
			dataType: 'json',
			success: function(data){
				_g.dao.getCitas();			
				_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
			}
		});					
	},
};