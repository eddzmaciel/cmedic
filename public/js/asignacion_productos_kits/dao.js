_g.dao = {
	getProductosAsignados :function(id_kits){
		$.ajax({
			url: '/api_inv/rel_productos_kit/'+id_kits,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#listado_productos').html('');			
			$.each(data, function(i) {
				$('#listado_productos').append("<option value=\""+data[i].id+"\">"+data[i].id_producto+"<\/option>");
			});
		}).fail(function(data) {
		    _gen.notificacion('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getProductosActivos : function(){
		$.ajax({
			url: 'api_inv/productos',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#listado_productos').html('');
			$.each(data, function(i) {
				$('#listado_productos').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			$.get('api_inv/rel_productos_kit/'+$("#id_kits").val(), function(data){
				if(data!=""){
					$.each(data, function(i) {
						$('#listado_productos option[value="'+data[i].id_producto+'"]').attr('selected',true);
					});
				}
			}).done(function(data) {
				var casetasDuallist = $('#listado_productos').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>',moveOnSelect:4});
				var container1 = casetasDuallist.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-info btn-bold btn-success');
				$('#listado_productos').bootstrapDualListbox('refresh');
			});
		});
	}
};