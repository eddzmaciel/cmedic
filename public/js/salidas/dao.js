_g.dao = {
	getSalidas :function(){
		$.ajax({
			url: '/api_inv/entregas',
			type: 'GET',
			dataType: 'json',
			success: function(data){				
				var datelist = data;var table = $('#tblDataSalidas');
				table.dataTable().fnDestroy();
				$.each(data, function(i) {					
					if(data[i].estatus == 1){
					 	data[i].label_estatus = '<span class="label label-success">En Proceso</span>';
					}if(data[i].estatus == 0){
					 	data[i].label_estatus = '<span class="label label-warning">Pendiente</span>';
					}
				});
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "folio_entrega"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "fecha_entrega"},
				    	      	  {"aTargets" : [ 4 ], "mData" : "id_autorizo"},
				    	      	  {"aTargets" : [ 5 ], "mData" : "label_estatus"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);			
			}
		});
	},
	getListadoProductosOrden :function(id){
		$.ajax({
			url: '/api_inv/list_productos_entregados/'+id,
			type: 'GET',
			dataType: 'json',
			success: function(data){				
				var datelist = data;var table = $('#tblDataListadoSalidaProductos');
				table.dataTable().fnDestroy();
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
				    	          {"aTargets" : [ 2 ], "mData" : "precio"},
				    	          {"aTargets" : [ 3 ], "mData" : "cantidad"}];
				_gen.setTableNE(table,columnDefs,datelist);
				_gen.selectRowsTableNE(table);			
			}
		});
	},
};