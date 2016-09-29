pageSetUp();
var pagefunction = function() {
	//_g.dao.getXML();
	localStorage.EditarParametrizacion = false;
	localStorage.id_dispercion_ingresos = 0;
	localStorage.cantidad_operacion_clientes = 0;
	_g.listas.getEmpresas();	
	$('#id_sucursal').select2();
	$("#desde, #hasta").datepicker({ 
		dateFormat: 'yy-mm-dd',
		language: "es" 
	});			
	Dropzone.autoDiscover = false;

	/*  DROPZONE JS FUNCTION  */

	$("#mydropzone").dropzone({
		init: function() {
            myDropzone = this;
            
            this.on("addedfile", function(file) {
            	//_gen.notificacion_min('Espere', 'La operaci&oacute;n puede tardar, ya que depende de su conexi&oacute;n de Internet y la cantidad de documentos',1);
            });
            
            this.on("complete", function(file) {
            	if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
		            $('#cargandoInfo').show();
                	$('#tblInconsistencias').dataTable();
		            _g.listas.getCatMonedas();
		            _g.listas.getCatCuentasContableParametrizacion($('#id_empresa_data').val());
					_g.dao.getParametrizacion();
		        }
                myDropzone.removeFile(file);
            });


	    },
	    acceptedFiles: ".xml,.XML",
		autoProcessQueue: true,
		addRemoveLinks : true,
		maxFilesize: 5,
		uploadMultiple: false,
		dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Seleccione los archivos <span class="font-xs">xml</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
		dictResponseError: 'Error uploading file!'
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


	/* BUTTON FUNCTION  */
	$('#btnCargar').click(function (event){
		event.preventDefault();
		if($('#id_empresa_data').val() != 0){

			$('#cargarXML').show('slow');
			$('#GroupCancelar').show('slow');
			$('#tbl11').hide();
			$('#GroupIniciales').hide();				
			$('#group-filter').hide();	

		}else{
			_gen.notificacion_min('Error', 'Seleccione una empresa por favor',4);
		}

	});

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

	$('#btnImprimir').click(function (event){
		event.preventDefault();
		_gen.notificacion_min('Error', 'Formato de impresion por definir',4);
	});

	$("#btnProcesar").on("click", function() {
			$(this).off( event );
			$('#WdtDropzone').hide();
			$('#cargandoInfo').show();
        	$('#tblInconsistencias').dataTable();
            _g.listas.getCatMonedas();
            _g.listas.getCatCuentasContableParametrizacion($('#id_empresa_data').val());
			_g.dao.getParametrizacion();
	});

	$('#btnConsultar').click(function (event){
		event.preventDefault();
		_g.dao.getXMLAvanzada();
	});

	$('#btnNuevaDepartamento').click(function (event){
		event.preventDefault();
		$('#NuevoDepartamentoNomina').modal('show');
	});

	$('#btnAgregarDepartamento').click( function(e){
		e.preventDefault();
		if( $('#departamento').val() != '') {
			$.post('/api_cont/departamento_nomina', { departamento: $("#departamento").val()})
			.done(function(data) {
				_g.listas.getDepartamentoNomina();			
				_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
				$('#NuevoDepartamentoNomina').modal('hide');
			}).fail(function(data) {
				_g.listas.getDepartamentoNomina();
			    _gen.notificacion_min('Error', data.responseText,4);
				$('#NuevoDepartamentoNomina').modal('hide');
			});	
		}else{
			_gen.notificacion_min('Error','Es necesario llenar los datos',4);
		}
	});

	$('#btnEstructuraAdecuada').click( function(e){
		e.preventDefault();
		$.get('/api_cont/xml_dispercion_nomina/'+$('#id_empresa').val())
		.done(function(data) {
			_g.dao.getTablaDispercionNominaTotales();
			_g.dao.getTablaDispercionNomina();
			_g.listas.getDepartamentoNomina();			
			_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
		}).fail(function(data) {
			_g.dao.getTablaDispercionNominaTotales();
			_g.dao.getTablaDispercionNomina();
			_g.listas.getDepartamentoNomina();	
		    _gen.notificacion_min('Error', data.responseText,4);
		});	
	});

	$('#btnDispercion').click(function (event){
		event.preventDefault();
		_g.dao.getTablaDispercionClientes();
		_g.dao.getTablaDispercionProveedores();
		_g.listas.getConceptosDispercion($('#id_empresa').val(),$('#id_concepto_dispercion'));
		_g.listas.getCatCuentasContableCuztom($('#id_empresa_data').val(),$('#id_cuenta_contable_dispercion'));
	});

	$('#TabHNomina').click(function (event){
		event.preventDefault();
		_g.dao.getTablaDispercionNominaTotales();
		_g.dao.getTablaDispercionNomina();
		_g.listas.getDepartamentoNomina();
		$('#HeaderNomina').show('slow');
		$('#HeaderClientesProveedores').hide();
	});

	$('#TabHClientes, #TabHProveedores').click(function (event){
		event.preventDefault();
		$('#HeaderNomina').hide();
		$('#HeaderClientesProveedores').show('slow');
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


	/** FUNCIONES DE DISPERCION MULTIPLE  **/

	$("#operaciones_clientes").keypress( function(e) {
		if(e.which == 13) {
			e.preventDefault();
			if($('#id_cuentas_conceptos_clientes').val() != 0){
				_g.dao.getOperacionesClientes();				
			}else{
				_gen.notificacion_min('Error', 'Es necesario seleccionar una cuenta del concepto',4);
			}
	    }
	});

	$("#operaciones_proveedores").keypress( function(e) {
		if(e.which == 13) {
			e.preventDefault();
			if($('#id_cuentas_conceptos_proveedores').val() != 0){
				_g.dao.getOperacionesProveedores();				
			}else{
				_gen.notificacion_min('Error', 'Es necesario seleccionar una cuenta del concepto',4);
			}
	    }
	});

	$('#btnDispercionI').click(function (event){
		event.preventDefault();
		_g.dao.getAsignarDispercion(selectedRows,2,1);
	});

	$('#btnDispercionE').click(function (event){
		event.preventDefault();
		_g.dao.getAsignarDispercion(selectedRows,3,1);
	});

	/**	END **/

	/** DISPERCION **/

	$('#btnCuentaConcepto').click(function (event){
		event.preventDefault();
		var parametros = {
			"id_xml_concepto" : $('#id_concepto_dispercion').val(),
			"id_cuenta" : $('#id_cuenta_contable_dispercion').val(),
 		};
 		if($('#id_cuenta_contable_dispercion').val() != 0 && $('#id_concepto_dispercion').val() != 0){
 			$('#id_cuenta_contable_dispercion').val(0);
			$.ajax({
				data : parametros,
				url: '/api_cont/dispercion_conceptos',
				type: 'POST',
				dataType: 'json',
			}).done( function (data){
				$.ajax({
					url: '/api_cont/dispercion/cuentas_concepto/'+$('#id_concepto_dispercion').val(),
					type: 'GET',
					dataType: 'json',
				}).done( function (data){
					_g.dao.getConceptosCuentas(data);
				});
				_g.listas.getCatCuentasContableId($('#id_concepto_dispercion').val(),$('#id_cuenta_contable_dispercion'));
				_gen.notificacion_min('Exito', 'Se guardo correctamente',1);
			});
 		}else{
			_gen.notificacion_min('Error', 'Es necesario seleccionar un concepto y una cuenta contable',4);
 		}
	});

	$("#id_concepto_dispercion").change(function(event) {
		_g.listas.getCatCuentasContableId($('#id_concepto_dispercion').val(),$('#id_cuenta_contable_dispercion'));

		$.ajax({
			url: '/api_cont/dispercion/cuentas_concepto/'+$('#id_concepto_dispercion').val(),
			type: 'GET',
			dataType: 'json',
		}).done( function (data){
			_g.dao.getConceptosCuentas(data);
		});
	});
	/** END **/

	$('#btnCancelar').click(function (){
		_g.listas.getEmpresas();				
		$('#cargarXML, #GroupCancelar, #WdtParametrizacion').hide();
		$('#GroupIniciales, #WdtDropzone, #group-filter, #tbl11').show('slow');
		$('#id_sucursal').select2();
	});

	$("#id_empresa").change(function(event) {
		var id = $('#id_empresa').val();
		$('#id_empresa_data').val(id);
		_g.dao.getValidParametrizacion();
		_g.listas.getEmpresasSucursales();
		_g.dao.getXMLAvanzada();	
	});


	$("#id_sucursal").change(function(event) {
		var id = $('#id_sucursal').val();
		$('#id_sucursal_data').val(id);
		//_g.listas.getSucursalesCC();
	});

	$("#no_deducible").change(function(event) {
		if($("#no_deducible").is(':checked')){                          
		   $("#no_deducible").val('1');     
		}else{
		   $("#no_deducible").val('0');     
		}  
	});

	$("#IVAAcreIdentE").change(function(event) {
		if($("#IVAAcreIdentE").is(':checked')){                          
		   $("#IVAAcreIdentE").val('1');     
		}else{
		   $("#IVAAcreIdentE").val('0');     
		}  
	});

	$("#IvaAcreNOIdentE").change(function(event) {
		if($("#IvaAcreNOIdentE").is(':checked')){                          
		   $("#IvaAcreNOIdentE").val('1');     
		}else{
		   $("#IvaAcreNOIdentE").val('0');     
		}  
	});

	$("#IVAAcreExentoE").change(function(event) {
		if($("#IVAAcreExentoE").is(':checked')){                          
		   $("#IVAAcreExentoE").val('1');     
		}else{
		   $("#IVAAcreExentoE").val('0');     
		}  
	});
};


pagefunction();