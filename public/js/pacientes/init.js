$(document).ready(function(){
	_g.dao.getPacientes();
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
	$('#btnConfirmarBaja').click(function (){
		if($('#id_paciente_baja').val() != '' && $('#estatus_baja').val() != 3){
		$.SmartMessageBox({
			title : 'Confirmar cambio de estatus',
			content : 'Porfavor confirme que desea cambiar el estatus del usuario',
			buttons : '[No][Cambiar]'
		}, function(btn) {
			if (btn === "Cambiar") {					
				$.ajax({
					url: '/api_admin/pacientes/'+$('#id_paciente_baja').val(),
					type: 'DELETE',
					data: $('#frmBajaPaciente').serializeObject(),
					dataType: 'json',			
				}).done(function(data){
					$('#ConfirmarModal').modal('hide');
					_g.dao.getPacientes();
					_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
				}).fail(function(data){
					_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
				});
			}
		});
		}else{
			_gen.notificacion_min('Aviso', 'Al parecer no se encuentra seleccionado un paciente, recargue e intente de nuevo',4);
		}		
	});

});