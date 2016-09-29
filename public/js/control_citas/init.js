$(document).ready(function(){
	_g.currentDates={};
	localStorage["id_paciente"] = '';
	var sucursal = 0;
	_g.dao.getListadoCitas(sucursal);
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
		_g.dao.getListadoCitas($('#id_sucursal').val());
	});
	$('#btnInformacion').click(function (){		
		if(_g.currentDates['id_paciente'] != null){
			localStorage["id_paciente"] = _g.currentDates['id_paciente'];
			window.location.href='/#admin/pacientes/info';
		}else{
			_gen.notificacion_min('Aviso', 'Es necesario seleccionar un paciente',4);
		}
	});
	$('#btnGuardarObservacion').click(function (){		
		if($('#id_paciente_observacion').val() != ''){		
			_g.dao_g.getObservaciones($('#id_paciente_observacion').val(),1,$('#rep_observacion').val());			
			$('#observacionesModal').modal('hide');
		}else{
			_gen.notificacion_min('Aviso', 'Es necesario seleccionar un paciente',4);
		}
	});
	$('#btnCancelarCita').click(function (){		
		if($('#id_paciente_cancelar').val() != '' && $('#estatus').val() == 1){
			$.SmartMessageBox({
					title : 'Confirmar cancelacion de cita',
					content : 'Porfavor confirme que desea cancelar el estatus del usuario',
					buttons : '[No][Continuar]'
				}, function(btn) {
					if (btn === "Continuar") {
						$.post( "/api_admin/cancelar_cita", { id_paciente: $('#id_paciente_cancelar').val(), familiar_confirmo: $('#familiar_cancelo').val(), comentario: $('#comentario_cancelacion').val()})
						.done(function( data ) {
							$('#CancelarModal').modal('hide');
							_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
							_g.dao.getListadoCitas($('#id_sucursal').val());
						}).fail(function(data){
							_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de guardar, intente de nuevo.',4);
						});
					}
			});
		}else{
			_gen.notificacion_min('Aviso', 'La información es incorrecta, intente de nuevo',4);
		}
	});
	$('#btnConfirmarCita').click(function (){		
		if($('#id_paciente_confirmar').val() != '' && $('#estatus_confirmar').val() == 1){
			$.SmartMessageBox({
					title : 'Confirmar cita',
					content : 'Porfavor confirme que desea confirmar la cita del paciente',
					buttons : '[No][Confirmar]'
				}, function(btn) {
					if (btn === "Confirmar") {
						$.post( "/api_admin/historial_citas", { id_paciente: $('#id_paciente_confirmar').val(), familiar_confirmo: $('#familiar_confirmo').val(), comentario: $('#comentario').val()})
						.done(function( data ) {
							$('#ConfirmarModal').modal('hide');
							_g.dao.getListadoCitas($('#id_sucursal').val());
							_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
						}).fail(function(data){
							_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de guardar, intente de nuevo.',4);
						});
					}
			});
		}else{
			_gen.notificacion_min('Aviso', 'La información es incorrecta, intente de nuevo',4);
		}
	});
});