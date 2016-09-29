pageSetUp();
var pagefunction = function() {
	localStorage.EditarParametrizacion = true;
	_g.listas.getEmpresasSelect2Off();

	$('#btnParametrizar').click(function(){
		if($('#id_empresa').val() != '')
		{
			$('#WdtSelect').hide();
			$('#cargandoInfo').show();
			$('#id_empresa_data').val($('#id_empresa').val());
			_g.dao.getParametrizacionModificar();
			_g.listas.getCatCuentasContableParametrizacion($('#id_empresa').val());			
		}
	});

	/*  WIZARD JS FUNCTION  */
	var wizard = $('.wizard').wizard();
	wizard.on('change' , function(e, info){
		if(info.step == 1 ) {
			selectedRows = [];		  		  		
		    return true; 		
		}if(info.step == 2){
			selectedRows = [];
		}if(info.step == 3){
			$('.success').removeClass('success');	
			selectedRows = [];
		}if(info.step == 4){
			$('.success').removeClass('success');		
			selectedRows = [];
		}if(info.step == 5){
			$('.success').removeClass('success');
			selectedRows = [];
		}if(info.step == 6){
			$('.success').removeClass('success');
			selectedRows = [];
		}if(info.step == 7){
			selectedRows = [];
		}			    			    
	}).on('finished', function (e, data) {
		window.location.reload();
	}).on('stepclick', function(e){
	return false;
	});

	/** FUNCIONES DE ASIGNACION MULTIPLE  **/
	$('#btnAsignarCuentaI').click(function (event){
		event.preventDefault();
		_g.dao.getAsignarCuenta(selectedRows,2,1);
	});


	$('#btnAsignarCuentaE').click(function (event){
		event.preventDefault();
		_g.dao.getAsignarCuenta(selectedRows,3,1);
	});

	$('#btnAsignarCuentaNCF').click(function (event){
		event.preventDefault();
		_g.dao.getAsignarCuenta(selectedRows,5,1);
	});

	$('#btnAsignarCuentaNCC').click(function (event){
		event.preventDefault();
		_g.dao.getAsignarCuenta(selectedRows,4,1);
	});
	/**	END **/

	$('#SelectAllIngresosI').on('click', function(){
		var rows = $('#tblIngresos').dataTable()._('tr', {"filter":"applied"});
		if(rows.length != 0){		
			var selectedRows = [];
			jQuery.each( rows, function( i, val ) {		  
			  	selectedRows.push(rows[i]['id_datatable']);
			});			
			_g.dao.getAsignarCuenta(selectedRows,2,1);
		}else{
			_gen.notificacion_min('Error', 'Ningun concepto para asignar cuenta contable',4);			
		}
   	});

   	$('#SelectAllIngresosE').on('click', function(){
		var rows = $('#tblEgresos').dataTable()._('tr', {"filter":"applied"});
		if(rows.length != 0){		
			var selectedRows = [];
			jQuery.each( rows, function( i, val ) {		  
			  	selectedRows.push(rows[i]['id_datatable']);
			});			
			_g.dao.getAsignarCuenta(selectedRows,3,1);
		}else{
			_gen.notificacion_min('Error', 'Ningun concepto para asignar cuenta contable',4);			
		}
   	});

   	$('#SelectAllIngresosNCF').on('click', function(){
		var rows = $('#tblNCF').dataTable()._('tr', {"filter":"applied"});
		if(rows.length != 0){		
			var selectedRows = [];
			jQuery.each( rows, function( i, val ) {		  
			  	selectedRows.push(rows[i]['id_datatable']);
			});			
			_g.dao.getAsignarCuenta(selectedRows,5,1);
		}else{
			_gen.notificacion_min('Error', 'Ningun concepto para asignar cuenta contable',4);			
		}
   	});

   	$('#SelectAllIngresosNCC').on('click', function(){
		var rows = $('#tblNCC').dataTable()._('tr', {"filter":"applied"});
		if(rows.length != 0){
			var selectedRows = [];
			jQuery.each( rows, function( i, val ) {		  
			  	selectedRows.push(rows[i]['id_datatable']);
			});			
			_g.dao.getAsignarCuenta(selectedRows,4,1);			
		}else{
			_gen.notificacion_min('Error', 'Ningun concepto para asignar cuenta contable',4);			
		}
   	});

};
pagefunction();