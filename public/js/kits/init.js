$(document).ready(function(){
	_g.dao.getKits();
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
	$('#btnEditar').click(function(e){
		e.preventDefault();
		if(_g.currentDates['id'] != null  && _g.currentDates['id'] != ''){
			window.location.href='/#inventario/kits/editar/'+_g.currentDates['id'];			
		}else{
			_gen.notificacion('Aviso', 'Es necesario seleccionar un registro',4);
		}
	});
	$('#btnEliminar').click(function(e){
		e.preventDefault();
		if(_g.currentDates['id'] != null  && _g.currentDates['id'] != ''){
			_g.dao.getEliminarKits();		
		}else{
			_gen.notificacion('Aviso', 'Es necesario seleccionar un registro',4);
		}
	});
});