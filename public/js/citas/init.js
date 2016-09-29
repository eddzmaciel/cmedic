$(document).ready(function(){
	_g.dao.getCitas();
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

jQuery(function($) {
	$('#btnEdit').click(function(e){
		e.preventDefault();
		if(_g.currentDates['id'] != null){				
			$('#id_paciente').val(_g.currentDates['id_paciente']);
			$('#estatus').val(_g.currentDates['estatus']);
			$('#dia').val(_g.currentDates['dia']);
			$('#hora').val(_g.currentDates['hora']);
		}else{
			_gen.notificacion('Aviso', 'Es necesario seleccionar un registro',4);
		}
	});

});