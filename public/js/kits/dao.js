_g.dao = {
	getKits :function(){
		$.ajax({
			url: '/api_inv/kits',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				// $('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				var datelist = data;var table = $('#tblDataKits');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "nombre"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);			
			}
		});
	},
	getEliminarKits :function(){
		$.ajax({
			url: '/api_inv/kits/'+_g.currentDates['id'],
			type: 'DELETE',
			dataType: 'json',			
		}).done(function(data){
			_g.dao.getKits();
			_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
		}).fail(function(data){
			_gen.notificacion('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
		});
	},
};