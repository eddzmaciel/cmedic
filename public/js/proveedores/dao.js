_g.dao = {
	getProveedores :function(){
		$.ajax({
			url: '/api_inv/proveedores',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				// $('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				var datelist = data;var table = $('#tblDataProveedores');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
				    	          {"aTargets" : [ 2 ], "mData" : "empresa"},
				    	          {"aTargets" : [ 3 ], "mData" : "direccion"},
				    	          {"aTargets" : [ 4 ], "mData" : "rfc"},
				    	          {"aTargets" : [ 5 ], "mData" : "telefono"},
				    	          {"aTargets" : [ 6 ], "mData" : "email"},
				    	          {"aTargets" : [ 7 ], "mData" : "responsable"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);			
			}
		});
	},
	getEliminarProveedores :function(){
		$.ajax({
			url: '/api_inv/proveedores/'+_g.currentDates['id'],
			type: 'DELETE',
			dataType: 'json',			
		}).done(function(data){
			_g.dao.getProveedores();
			_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
		}).fail(function(data){
			_gen.notificacion('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
		});
	},
};