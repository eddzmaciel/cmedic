$(document).ready(function(){	
	_g.dao.getListadoPreDiagnostico();
	_g.dao.getListadoPrePeso();
	_g.dao.getListadoPreMedicamentos();
	_g.dao.getListadoHemoPre();
	_g.dao.getListadoHemoSignosPre();
	_g.dao.getListadoHemoSignosPost();
	_g.dao.getListadoHemoEvolucion();
	_g.dao.getListadoHemoOtros();
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
	
});