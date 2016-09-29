_g.dao = {
	getPagos :function(){
		$.ajax({
			url: '/api_admin/pagos',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				//$('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				$.each(data, function(i) {
					if(data[i].concepto_pago == 1){
						data[i].label_concepto_pago = 'Sesiones';
					}if(data[i].concepto_pago == 2){
						data[i].label_concepto_pago = 'Factura';
					}if(data[i].concepto_pago == 3){
						data[i].label_concepto_pago = 'Anticipo a sesiones';
					}
				});
				var datelist = data;var table = $('#tblDataPagos');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "id_paciente"},
				    	          {"aTargets" : [ 2 ], "mData" : "num_sesiones"},
				    	          {"aTargets" : [ 3 ], "mData" : "cantidad"},
				    	          {"aTargets" : [ 4 ], "mData" : "label_concepto_pago"},
				    	          {"aTargets" : [ 5 ], "mData" : "fecha_pago"}
				    	//           {
									// "aTargets": [ 6 ],
									// "mData": null,
									// "mRender": function (o) { 
									// 	return '<a class="btn btn-sm btn-primary" href=/#app/categorias/editar/' + o.id + '>' + '<i class="glyphicon glyphicon-ok"></i></a>&nbsp;'											  
									// 		  +'<a class="btn btn-sm btn-success" onclick="_g.dao.getEliminarCategorias(' + o.id + ')">' + '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;'
									// 		  +'<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarCategorias(' + o.id + ')">' + '<i class="glyphicon glyphicon-trash"></i></a>'; 
									// }
								 //  }
								 	];
				_gen.setTable(table,columnDefs,datelist);			
			}
		});
	},
};