_g.dao = {
	getlistAsignacionSesiones :function(){
		$.ajax({
			url: '/api_admin/historial_sesiones_beneficiencia/'+$("#id_empresa_beneficiencia").val(),
			type: 'GET',
			dataType: 'json',
			success: function(data){
				// $('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				var datelist = data;var table = $('#tblDataListadoAsignacionSesiones');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "id_paciente"},
				    	          {"aTargets" : [ 2 ], "mData" : "total_sesiones"}];
				_gen.setTableNE(table,columnDefs,datelist);
				_gen.selectRowsTableNE(table);				
			}
		});
	},
	getlistControlSesiones :function(){
		$.ajax({
			url: '/api_admin/historial_sesiones_beneficiencia',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				// $('#total').append('Total <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.total+'</span>');
				// $('#activos_usuarios').append('Activos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.activos+'</span>');
				// $('#inactivos_usuarios').append('Inactivos <span class="txt-color-blue"><i class="fa fa-male"></i>&nbsp;'+data.suspendidos+'</span>');
				var datelist = data;var table = $('#tblDataControlSesiones');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "id_paciente"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_empresa_beneficiencia"},
				    	          {"aTargets" : [ 3 ], "mData" : "total_sesiones"}];
				_gen.setTable(table,columnDefs,datelist);
				_gen.selectRowsTable(table);
				_g.listas.getPacientesBeneficiadosNoAsignados();				
			}
		});
	},
};