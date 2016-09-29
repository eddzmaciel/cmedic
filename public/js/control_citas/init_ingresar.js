$(document).ready(function(){
	_g.currentDates={};
	_g.dao.getPacienteId();
	$('#id_paciente').val('');
	$('#id_paciente').val(localStorage["id_paciente"]);
});

loadScript("assets/js/plugin/datatables/jquery.dataTables.min.js", function(){
	loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function(){
		loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function(){
			loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function(){
				loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
			});
		});
	});
});

$(function() {
	// $('#btnConfirmarPaciente').click(function (){
	// 	if(localStorage["id_paciente"] != ""){
	// 		$.post( "/api_admin/historial_citas", { id_paciente: id_paciente})
	// 		.done(function( data ) {
	// 			_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
	// 		}).fail(function(data){
	// 			_gen.notificacion('Aviso', 'Al parecer se presento un problema al momento de guardar, intente de nuevo.',4);
	// 		});
	// 	}else{
	// 		_gen.notificacion('Aviso', 'No se mantiene la información de algun paciente, intente de nuevo',4);
	// 		window.history.back();
	// 	}
	// });
});