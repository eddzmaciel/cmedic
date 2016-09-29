$(document).ready(function(){
	_g.dao.getProductosActivos();
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

	$("#id_kits").change(function(event) {
		_g.dao.getProductosActivos();
	});

	$("#btnGuardarAsignacion").click(function(e) {
		e.preventDefault();
		if( $('#id_kits').val() != '') {
			$.post('/api_inv/rel_productos_kit', {id_kit: $("#id_kits").val(), id_producto: $('[name="listado_productos[]"]').val()})
			.done(function(data) {
				_g.dao.getProductosActivos();			
				_gen.notificacion('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
			}).fail(function(data) {
				_g.dao.getProductosActivos();
			    _gen.notificacion('Error', data.responseText,4);
			});	
		}else{
			_gen.notificacion('Error','Es necesario seleccionar un provedor y asignarle productos para continuar con el guardado',4);
		}
	});
});