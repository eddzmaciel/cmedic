_g.dao = {
	getProductos :function(){
		$.ajax({
			url: '/api_inv/productos',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				// $('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				var datelist = data;var table = $('#tblDataProductos');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "nombre"},
				    	          {"aTargets" : [ 2 ], "mData" : "descripcion"},
				    	          {"aTargets" : [ 3 ], "mData" : "precio"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);			
			}
		});
	},
	getEliminarProductos :function(){
		$.ajax({
			url: '/api_inv/productos/'+_g.currentDates['id'],
			type: 'DELETE',
			dataType: 'json',			
		}).done(function(data){
			_g.dao.getProductos();
			_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
		}).fail(function(data){
			_gen.notificacion('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
		});
	},
	getInfoProductos :function(){
		$.ajax({
			url: '/api_inv/productos/'+_g.currentDates['id'],
			type: 'GET',
			dataType: 'json',			
		}).done(function(data){
			$('#infoDetalleProducto').html('');
			if(data != ""){
				$('#infoDetalleProducto').append('<tbody>');				
				$('#infoDetalleProducto').append('<tr><td>Producto </td><td> : '+data.nombre+'</td></tr>');
				$('#infoDetalleProducto').append('<tr><td>Descripcion </td><td> : '+data.descripcion+'</td></tr>');
				$('#infoDetalleProducto').append('<tr><td>Marca </td><td> : '+data.marca+'</td></tr>');
				$('#infoDetalleProducto').append('<tr><td>Precio </td><td> : '+data.precio+'</td></tr>');
				$('#infoDetalleProducto').append('<tr><td>Partida </td><td> : '+data.partida+'</td></tr>');
				$('#infoDetalleProducto').append('<tr><td>Unidad de medida </td><td> : '+data.unidad_medida+'</td></tr>');
				$('#infoDetalleProducto').append('</tbody>');			
			}else{
				$('#infoDetalleProducto').append('<p>Al parecer no podemos mostrar la información</p>');
			}
			$('#modelInfo').modal('show');
		}).fail(function(data){
			_gen.notificacion('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
		});
	},
};