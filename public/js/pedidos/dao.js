_g.dao = {
	getPedidos :function(){
		$.ajax({
			url: '/api_inv/pedidos',
			type: 'GET',
			dataType: 'json',
			success: function(data){				
				var datelist = data;var table = $('#tblDataPedidos');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "num_orden"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_proveedor"},
				    	          {"aTargets" : [ 3 ], "mData" : "estatus"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTableNE(table);			
			}
		});
	},
	getlistadoOrdenes : function(id){
		$.get('api_inv/pedidos/'+id)
		.done(function(data) {
			if(data!=""){
				$('#id_pedido').html('');
				$('#id_pedido').append($('<option></option>').text('Seleccione un numero de orden').val(''));
				$.each(data, function(i) {
					$('#id_pedido').append("<option value=\""+data[i].id+"\">"+data[i].num_orden+"<\/option>");
				});
				$('#id_pedido').select2().select2("val",'');
			}else{
				$('#id_pedido').html('');
				$('#id_pedido').append($('<option></option>').text('No existe ninguna orden pendiente').val(''));
				$('#id_pedido').select2().select2("val",'');
			}							
		});
	},
	getListadoProductosOrden :function(id){
		$.ajax({
			url: '/api_inv/list_productor_pedidos/'+id,
			type: 'GET',
			dataType: 'json',
			success: function(data){				
				var datelist = data;var table = $('#tblDataListadoProductosOrden');
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