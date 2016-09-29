_g.dao = {
	getAlmacen :function(){
		$.ajax({
			url: '/api_inv/almacen',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				// $('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				var datelist = data;var table = $('#tblDataAlmacen');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "id_producto"},
				    	          {"aTargets" : [ 2 ], "mData" : "nivel_notificacion"},
				    	          {"aTargets" : [ 3 ], "mData" : "cantidad"},
				    	          {"aTargets" : [ 4 ], "mData" : "estatus"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);			
			}
		});
	},
};