$(document).ready(function(){
	_g.currentDates={};
	localStorage["id_paciente"] = '';
	var sucursal = 0;
	_g.dao.getListadoSesiones(sucursal);
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
	$('#id_sucursal').change(function(e){
		_g.dao.getListadoSesiones($('#id_sucursal').val());
	});


	$('#btnIniciarSesion').click( function (e){
		if($('#id_paciente_entrar').val() != ''){		
			$.SmartMessageBox({
					title : 'Confirmar iniciar sesion',
					content : 'Porfavor confirme que desea iniciar la sesion del paciente',
					buttons : '[No][Confirmar]'
				}, function(btn) {
					if (btn === "Confirmar") {
						$('#EntrarSesionModal').modal('hide');
						$.post( "/api_admin/iniciar_sesion", { id_paciente: $('#id_paciente_entrar').val(), id_estacion: $('#id_estaciones').val(), id_doctor: $('#id_doctores').val(), id_enfermera: $('#id_enfermeros').val()})
						.done(function( data ) {
							$('#EntrarSesionModal').modal('hide');
							_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
							_g.dao.getListadoSesiones($('#id_sucursal').val());
							_g.listas.getEstaciones();
						}).fail(function(data){
							_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de guardar, intente de nuevo.',4);
						});
					}
			});
		}else{
			_gen.notificacion_min('Aviso', 'La información es incorrecta, intente de nuevo',4);
		}
	});

	$('#btnCancelarFactura').click( function (e){
		if($('#id_paciente_cancelar_factura').val() != ''){		
			$.SmartMessageBox({
					title : 'Confirmar cancelar factura',
					content : 'Porfavor confirme que desea cancelar factura',
					buttons : '[No][Confirmar]'
				}, function(btn) {
					if (btn === "Confirmar") {
						$('#CancelarFacturaModal').modal('hide');
						_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
					}
			});
		}else{
			_gen.notificacion_min('Aviso', 'La información es incorrecta, intente de nuevo',4);
		}
	});

	$('#btnFacturar').click( function (e){
		if($('#id_paciente_facturar').val() != ''){		
			$.SmartMessageBox({
					title : 'Confirmar factura',
					content : 'Porfavor confirme que desea generar factura',
					buttons : '[No][Confirmar]'
				}, function(btn) {
					if (btn === "Confirmar") {
						$('#FacturarModal').modal('hide');
						_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
					}
			});
		}else{
			_gen.notificacion_min('Aviso', 'La información es incorrecta, intente de nuevo',4);
		}
	});

	$('#btnCancelarPago').click( function (e){
		if($('#id_paciente_cancelar_pago').val() != ''){		
			$.SmartMessageBox({
					title : 'Confirmar cancelar pago',
					content : 'Porfavor confirme que desea cancelar pago',
					buttons : '[No][Confirmar]'
				}, function(btn) {
					if (btn === "Confirmar") {
						$('#CancelarPagoModal').modal('hide');
						_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
					}
			});
		}else{
			_gen.notificacion_min('Aviso', 'La información es incorrecta, intente de nuevo',4);
		}
	});
});