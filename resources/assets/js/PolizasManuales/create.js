var dataAsiento = [], dataTipoEntidad = [], dataAsignacionXML = [], dataXMLUsados = [], dataCuentasBancoEmpresa = [], dataEntidades = [];
var id_asiento = 0, nombre_entidad = '';
var dao = {
	getXMLAsignados : function(data){
		var datelist = data;var table = $('#tblXMLAsociados');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "rfc"},
		    	          {"aTargets" : [ 1 ], "mData" : "nombre_entidad"},
		    	          {"aTargets" : [ 2 ], "mData" : "uuid"},
		    	          {"aTargets" : [ 3 ], "mData" : "total"},
		    	          {"aTargets" : [ 4 ], "mData" : "metodo_pago"},
		    	          {"aTargets" : [ 5 ], "mData" : "saldo"},
		    	          {
							"aTargets": [ 6 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-danger" target="_blank" onclick="dao.deleteXMLAsignado(' + o.id + ')"><i class="glyphicon glyphicon-remove"></i></a>&nbsp;';								
							}
						  }];
		_gen.setTableNE(table,columnDefs,datelist);
		if(datelist.length != 0){
			$('#tblAsociados, #tblAsociadosTitle').show('slow');
		}else{
			$('#tblAsociados, #tblAsociadosTitle').hide();			
		}
	},
	getXMLUsados : function(data){
		var datelist = data;var table = $('#tblXMLExistentes');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "rfc"},
		    	          {"aTargets" : [ 1 ], "mData" : "uuid"},
		    	          {"aTargets" : [ 2 ], "mData" : "total"},
		    	          {"aTargets" : [ 3 ], "mData" : "metodo_pago"},
		    	          {"aTargets" : [ 4 ], "mData" : "saldo"}];
		_gen.setTableNE(table,columnDefs,datelist);
		if(datelist.length != 0){
			$('#tblExistentes, #tblExistentesTitle').show('slow');
		}else{
			$('#tblExistentes,#tblExistentesTitle').hide();
		}
	},
	getAsientoContable : function(data){
		var datelist = data;var table = $('#tblPolizasManuales');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "clave"},
		    	          {"aTargets" : [ 1 ], "mData" : "descripcion"},
		    	          {"aTargets" : [ 2 ], "mData" : "entidad"},
		    	          {"aTargets" : [ 3 ], "mData" : "cargo"},
		    	          {"aTargets" : [ 4 ], "mData" : "abono"},
		    	          {
							"aTargets": [ 5 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-danger" target="_blank" onclick="dao.deleteAsientoContable(' + o.id + ')"><i class="glyphicon glyphicon-remove"></i></a>&nbsp;';								
							}
						  }];
		_gen.setTableNE(table,columnDefs,datelist);

	},
	deleteXMLAsignado : function(id){
		for(var i = 0; i < dataAsignacionXML.length; i++) {
		    if(dataAsignacionXML[i].id == id) {
		        dataAsignacionXML.splice(i, 1);
		        if(dataAsignacionXML.length == 0){
		        	dataAsignacionXML = [];
		        	dao.getXMLAsignados(dataAsignacionXML);
		        }else{
		        	dao.getXMLAsignados(dataAsignacionXML);
		        }
		    }
		}		
	},
	deleteAsientoContable : function(id){
		for(var i = 0; i < dataAsiento.length; i++) {
		    if(dataAsiento[i].id == id) {
		        dataAsiento.splice(i, 1);
		        if(dataAsiento.length == 0){
		        	dataAsiento = [];
		        	dao.getAsientoContable(dataAsiento);
		        }else{
		        	dao.getAsientoContable(dataAsiento);
		        }
		    }
		}
		dao.TotalesAsiento(dataAsiento);			

		for(var i = 0; i < dataEntidades.length; i++) {
		    if(dataEntidades[i].id == id) {
		        dataEntidades.splice(i, 1);
		        if(dataEntidades.length == 0){
		        	dataEntidades = [];
		        }
		    }
		}
	},
	TotalesAsiento : function(data){
		var TotalAbono = 0;
		var TotalCargo = 0;
		var Diferencia = 0;
		for(var i = 0; i < data.length; i++) {
		    TotalAbono = parseFloat(TotalAbono)+parseFloat(data[i].abono);
		    TotalCargo = parseFloat(TotalCargo)+parseFloat(data[i].cargo);						
		}
		Diferencia = TotalCargo-TotalAbono;
		$("#total_cargo").val(TotalCargo);
		$("#total_abono").val(TotalAbono);
		$("#diferencia").val(Diferencia);

		$('#textDiferencia').text('');
		if(TotalCargo != TotalAbono){
			if(TotalCargo > TotalAbono){
				$('#textDiferencia').text('El Cargo es mayor que el abono');								
				$('#diferenciaValidacion').show('slow');
			}if(TotalAbono >TotalCargo){
				$('#textDiferencia').text('El Abono es mayor que el cargo');								
				$('#diferenciaValidacion').show('slow');
			}
		}else{
			$('#diferenciaValidacion').hide();
			$('#textDiferencia').text('');
		}
	},
	CrearPoliza : function(){
		if($("#frmPolizaManual").valid() == true){
			$.get("/api_cont/cuentas_modificar/"+$('#id_cuenta_contable').val()).done(function(data){
				var TotalCargo = 0, TotalAbono = 0;
				if(nombre_entidad == '' || nombre_entidad == 'N/A'){
					nombre_entidad = 'N/A';
				}
				var info_asiento = {
					id : id_asiento,
					entidad : nombre_entidad,
					tc : $('#tc').val(),
					id_moneda : $('#id_moneda').val(),
					fecha_poliza : $('#fecha_poliza').val(),
					tipo_poliza : $('#tipo_poliza').val(),
					concepto_poliza : $('#concepto_poliza').val(),
					id_entidad : $('#id_entidad').val(),
					id_catalogo_entidad : $('#id_catalogo_entidad').val(),
					id_cuenta_contable : $('#id_cuenta_contable').val(),
					clave : data.codigo,
					descripcion : data.cuenta_contable,
					cargo : $('#cargo').val(),
					abono : $('#abono').val()
				};
				dataAsiento.push(info_asiento);
				dao.TotalesAsiento(dataAsiento);
				dao.getAsientoContable(dataAsiento);
				if($('#id_catalogo_entidad').val() != 0 && $('#id_entidad').val() != ''){
					if(dataEntidades.length != 0){
						$.each(dataEntidades, function(i) {
							if(dataEntidades[i].id_entidad != $('#id_entidad').val() || dataEntidades[i].id_catalogo_entidad  != $('#id_catalogo_entidad').val()){
								var entidad = {
									id : id_asiento,
									id_entidad : $('#id_entidad').val(),
									id_catalogo_entidad : $('#id_catalogo_entidad').val(),
								}
								dataEntidades.push(entidad);									
							}
						});
					}if(dataEntidades.length == 0){
						var entidad = {
							id : id_asiento,
							id_entidad : $('#id_entidad').val(),
							id_catalogo_entidad : $('#id_catalogo_entidad').val(),
						}
						dataEntidades.push(entidad);							
					}							
				}
				
				$('#contAC').html('').append('<i class="fa fa-file-archive-o"></i>&nbsp;'+dataAsiento.length);
				$('#contACBadge').html('').append(dataAsiento.length);
				//_gen.notificacion_min('Exito','El asiento se mantiene temporal, no se ha almacenado en base de datos',2);
				dao.limpiar();
				id_asiento++;
				return true;						
			});
		}else{
			_gen.notificacion_min('Error','No se cumple con todas las validaciones',4);				
		}	
	},
	limpiar : function(){
		$('#cargo, #abono').val('');
		$('#id_cuenta_contable').select2("val",'0');
		$('#id_cuenta').append($('<option></option>').text('Seleccione una cuenta').val('0'));
		$('#id_cuenta_contable').focus();
	},
	limpiarXMLManual : function(){
		$('#uuid,#rfc,#monto').val('');
		$('#metodo_pago').select2("val",'');
		$('#rfc').focus();
	},
	CuentasBancarias : function(div, label){
		$.ajax({
			url: '/api_cont/empresas_bancos/'+localStorage.id_empresa,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			var cuenta_principal = 0;
			dataCuentasBancoEmpresa = data;
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta '+label).val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].num_cuenta+" "+data[i].nombre_corto+"<\/option>");
				if(data[i].principal == 'on'){
					cuenta_principal++;
					div.select2().select2("val",data[i].id);					
				}
			});
			if(cuenta_principal == 0){
				div.select2().select2("val","0");					
			}
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	CuentasEntidades : function(id_entidad, tipo, div, label){
		var url_cuentas = '';
		if(tipo == 'proveedores'){
			url_cuentas = '/api_cont/proveedores_bancos/'+id_entidad;
		}if(tipo == 'clientes'){
			url_cuentas = '/api_cont/clientes_cuentas/'+id_entidad;
		}if(tipo == 'empleados'){
			url_cuentas = '/api_cont/empleados_cuentas/'+id_entidad;
		}
		$.ajax({
			url: url_cuentas,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta '+label).val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].num_cuenta+"<\/option>");
			});
			div.select2().select2("val",'0');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	GuardarPoliza : function(){
		if(dataAsiento.length >= 2){
			if($('#diferencia').val() == '0'){
				var id_cuenta_origen = 0, id_cuenta_destino = 0;
				if($('#tipo_poliza').val() == 'egreso' || $('#tipo_poliza').val() == 'ingreso'){
					id_cuenta_origen = $('#id_cuenta_origen').val();
					id_cuenta_destino = $('#id_cuenta_destino').val();
				}
				var infoPoliza = {							
					concepto : $('#concepto_poliza').val(),
					tipo_documento : $('#tipo_documento').val(),
					num_documento : $('#num_documento').val(),
					tipo_cambio : $('#tc').val(),
					id_moneda : $('#id_moneda').val(),
					fecha : $('#fecha_poliza').val(),
					tipo_poliza : $('#tipo_poliza').val(),
					id_cuenta_origen : id_cuenta_origen,
					id_cuenta_destino : id_cuenta_destino,
					id_empresa : localStorage.id_empresa,
					observaciones : $('#observaciones').val(),
					movimientos_bancarios : $('#movimientos_bancarios').val(),
				};
				var dataPoliza = {
					poliza : infoPoliza,
					asiento_manual : dataAsiento,
					xml_asociados : dataAsignacionXML,
				};

				$.ajax({
					data : dataPoliza,
					url: '/api_cont/polizas_manuales',
					type: 'POST',
					dataType: 'json'
				}).done(function (data){							
					_gen.notificacion_min('Exito','La poliza Manual se a generado con exito',2);
					window.location.href='/#contabilidad/poliza_manual';
				});
			}
		}else{
			_gen.notificacion_min('Aviso','Es necesario generar un asiento contable para poder guardar la poliza',4);
		}
	},
	GuardarPolizaValid : function(){
		if(dataEntidades.length == 1){
			if($('#tipo_poliza').val() == 'egreso' || $('#tipo_poliza').val() == 'ingreso'){
				if($('#id_cuenta_origen').val() != '0' && $('#id_cuenta_destino').val() != '0'){
					dao.GuardarPoliza();
				}else{
					_gen.notificacion_min('Aviso','Es necesario seleccionar una cuenta origen y una cuenta destino',4);
				}
			}
		}else{
			dao.GuardarPoliza();
		}
	},
	deleteXMLDuplicado : function(uuid){
		for(var i = 0; i < dataAsignacionXML.length; i++) {
		    if(dataAsignacionXML[i].uuid == uuid) {
		        dataAsignacionXML.splice(i, 1);
		        if(dataAsignacionXML.length == 0){
		        	dataAsignacionXML = [];
		        }
		    }
		}		
	},
	deleteXMLUsadosDuplicado : function(uuid){
		for(var i = 0; i < dataXMLUsados.length; i++) {
		    if(dataXMLUsados[i].uuid == uuid) {
		        dataXMLUsados.splice(i, 1);
		        if(dataXMLUsados.length == 0){
		        	dataXMLUsados = [];		        	
		        }
		    }
		}		
	},
};
var pagefunction = function() {
	/* Formulario wizard */	
	var wizard = $('.wizard').wizard();
	wizard.on('change' , function(e, info){
		if(info.step == 1 ) {
			if(dataAsiento.length >= 2){
				if($('#diferencia').val() == '0'){
					if(dataEntidades.length == 1){
						if($('#tipo_poliza').val() == 'egreso'){
							dao.CuentasBancarias($('#id_cuenta_origen'),'origen');
							dao.CuentasEntidades(dataEntidades[0].id_catalogo_entidad, dataEntidades[0].id_entidad, $('#id_cuenta_destino'),'destino');
						}if($('#tipo_poliza').val() == 'ingreso'){
							dao.CuentasBancarias($('#id_cuenta_destino'),'destino');
							dao.CuentasEntidades(dataEntidades[0].id_catalogo_entidad, dataEntidades[0].id_entidad, $('#id_cuenta_origen'),'origen');
						}
						$('#AsignacionCuentasOD').show('slow');
					}else{
						if($('#tipo_poliza').val() != 'egreso' && $('#tipo_poliza').val() != 'ingreso'){
							$('#id_cuenta_origen, #id_cuenta_destino').html('');
						} 
						$('#AsignacionCuentasOD').hide();
					}

		    		return true;
				}else{
					_gen.notificacion_min('Aviso','La diferencia debe ser igual a cero',4);				
					return false;
				}
			}else{
				_gen.notificacion_min('Aviso','Se requieren al menos 2 asientos contables para continuar',4);
				return false;
			}							
		}		    			    
	}).on('finished', function (e, data) {
		dao.GuardarPolizaValid();
	}).on('stepclick', function(e){
		if(e.step == 1 ) {
			$('#btnGuardarA').show();
		}
		return false;
	});

	/*  DROPZONE JS FUNCTION  */
	Dropzone.autoDiscover = false;
	$("#mydropzone").dropzone({
		init: function() {
            myDropzone = this;

            this.on("addedfile", function(file) {
            	//_gen.notificacion_min('Espere', 'La operaci&oacute;n puede tardar, ya que depende de su conexi&oacute;n de Internet y la cantidad de documentos',1);
            });            
            this.on("complete", function (file) { 		
            	if(this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
        			dao.getXMLUsados(dataXMLUsados);
        			dao.getXMLAsignados(dataAsignacionXML);
		        }
                myDropzone.removeFile(file);
            });
            this.on("success", function (file, responseText) {            	
            	var xmlExistentes = {};
        		var xml = {};
        		if(responseText.Existe == 'SI'){
        			xmlExistentes = {
        				'uuid' : responseText.uuid,
        				'metodo_pago' : responseText.metodo_de_pago,
        				'rfc' : responseText.rfc,
        				'saldo' : responseText.saldo,
        				'total' : responseText.total,
        			};
        			dataXMLUsados.push(xmlExistentes);
        			xmlExistentes = {};
        		}if(responseText.Existe == 'NO'){
        			xml = {
        				'uuid' : responseText.uuid,
        				'nombre_entidad' : responseText.nombre_entidad,
        				'metodo_pago' : responseText.metodo_de_pago,
        				'rfc' : responseText.rfc,
        				'saldo' : responseText.total,
        				'total' : responseText.total,
        			};
        			dataAsignacionXML.push(xml);
        		}
        		$('#contAX').html('').append('<i class="fa fa-file-archive-o"></i>&nbsp;'+dataAsignacionXML.length);
				$('#contAXBadge').html('').append(dataAsignacionXML.length);
	        });             
	    },
	    acceptedFiles: ".xml,.XML",
		autoProcessQueue: true,
		addRemoveLinks : true,
		maxFilesize: 5,
		uploadMultiple: false,
		url: 'api_cont/xml_polizas_manuales',
		method: 'POST',
		dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Seleccione los archivos <span class="font-xs">xml</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
		dictResponseError: 'Error uploading file!'
	});
	/* Carga dinamica conforme a la entidad seleccionada */
	$('#id_entidad').change(function(){
		nombre_entidad = 'N/A';
		if($(this).val() == 'clientes'){
			_g.listas.getClientesEmpresa(localStorage.id_empresa,$('#id_catalogo_entidad'))
		}if($(this).val() == 'proveedores'){
			_g.listas.getProveedoresEmpresa(localStorage.id_empresa,$('#id_catalogo_entidad'))
		}if($(this).val() == 'empleados'){
			_g.listas.getEmpleadosEmpresa(localStorage.id_empresa,$('#id_catalogo_entidad'))
		}

		if($(this).val() == ''){
			$('#id_cuenta_contable').focus();
			$('#id_catalogo_entidad').html('');
			$('#id_catalogo_entidad').append($('<option></option>').text('Seleccione').val('0'));
			$('#id_catalogo_entidad').select2("val",'0');
		}else{
			$('#id_catalogo_entidad').focus();				
		}
	});

	/* Validacion y confirmacion por tipo de cambio */
	$('#tc').keypress(function(e){
		if(e.which == 13){
			if(localStorage.tc != 0){
				$.SmartMessageBox({
					title : 'Confirmar',
					content : 'Porfavor confirme que desea usar un tipo de cambio de la cantidad de '+$('#tc').val(),
					buttons : '[No][Cambiar]'
				}, function(btn) {
					if (btn === "Cambiar") {					
						localStorage.tc = $('#tc').val();
						return true;
					}else{
						$('#tc').val(localStorage.tc);
						$('#id_moneda').focus();
						return false;
					}
				});					
			}else{
				localStorage.tc = $('#tc').val();
			}
			$('#id_moneda').focus();
		}
	});
	/* Validacion y confirmacion por tipo de moneda */
	$('#id_moneda').change(function(e){					
		if(localStorage.id_moneda != 0){
			$.SmartMessageBox({
				title : 'Confirmar',
				content : 'Porfavor confirme que desea cambiar el tipo de moneda',
				buttons : '[No][Cambiar]'
			}, function(btn) {
				if (btn === "Cambiar") {					
					localStorage.id_moneda = $('#id_moneda').val();
					if(localStorage.id_moneda == '101'){
						$('#tc').val('1');
						$('#fecha_poliza').focus();

					}else{
						$('#tc').val('').focus();
					}
					return true;
				}else{
					$('#id_moneda').select2("val",localStorage.id_moneda);
					$('#fecha_poliza').focus();
				}
			});					
		}else{
			localStorage.id_moneda = $('#id_moneda').val();
			$('#fecha_poliza').focus();
		}
	});

	$('#id_moneda').keypress(function(e){
		if(e.which == 13){
			if($(this).val() == '101'){
				$('#fecha_poliza').focus();
			}else{
				$.SmartMessageBox({
					title : 'Confirmar',
					content : 'Porfavor confirme que desea cambiar el tipo de moneda',
					buttons : '[No][Cambiar]'
				}, function(btn) {
					if (btn === "Cambiar") {					
						localStorage.id_moneda = $('#id_moneda').val();
						$('#tc').val('').focus();
						return true;
					}else{
						$('#id_moneda').select2("val",localStorage.id_moneda);
						$('#fecha_poliza').focus();
					}
				});
			}
		}
	});		
	/* Validacion y confirmacion por fecha poliza siguiente focus */
	$('#fecha_poliza').keypress(function(e){
		if(e.which == 13){
			$(this).valid();
			$('#tipo_poliza').focus();
		}
	});
	/* Validacion y confirmacion por tipo poliza siguiente focus */
	$('#tipo_poliza').change(function(e){
		$('#concepto_poliza').focus();
		$('#tipo_poliza_data').val($(this).val());
	});
	/* Validacion y confirmacion por concepto de poliza siguiente focus */
	$('#concepto_poliza').keypress(function(e){
		if(e.which == 13){
			$('#id_entidad').focus();
		}
	});
	/* Validacion y confirmacion para cuenta contable y siguiente focus */
	$('#id_cuenta_contable').change(function(e){
		nombre_entidad = 'N/A';

		if($('#id_entidad').val() == 'clientes' && $('#id_catalogo_entidad').val() != '0'){
			$.get("/api_cont/info_clientes/"+$('#id_catalogo_entidad').val()).done(function(data){
				nombre_entidad = data.nombre;
			});										
		}if($('#id_entidad').val() == 'proveedores' && $('#id_catalogo_entidad').val() != '0'){
			$.get("/api_cont/info_proveedor/"+$('#id_catalogo_entidad').val()).done(function(data){
				nombre_entidad = data.nombre;
			});																	
		}if($('#id_entidad').val() == 'empleados' && $('#id_catalogo_entidad').val() != '0'){
			$.get("/api_cont/info_empleados/"+$('#id_catalogo_entidad').val()).done(function(data){
				nombre_entidad = data.nombre;
			});																	
		}

		if($(this).val() != ''){
			$('#cargo').focus();							
		}
	});
	/* Validacion y confirmacion para cargo y siguiente focus */
	$('#cargo').keypress(function(e){
		if(e.which == 13){
			if($(this).val() == ''){
				$(this).val('0');
				$('#abono').focus();				
			}if($(this).val() != '' && $(this).val() != '0'){
				$('#abono').val('0');
				dao.CrearPoliza();
			}
			e.preventDefault();
			$("#cargo").blur();
		}
	});
	/* Validacion y confirmacion para abono y siguiente focus */
	$('#abono').keypress(function(e){
		if(e.which == 13){
			if($('#cargo').val() == '0' && $(this).val() == '0'){
				_gen.notificacion_min('Error','Es obligatorio agregar un cargo o abono',4);
				$('#abono').focus();
			}if($(this).val() != '0' && $(this).val() != ''){
				$('#cargo').val('0');
				dao.CrearPoliza();
			}
			e.preventDefault();
			$("#abono").blur(); 
		}
	});

	/* VALIDACIONES JQUERY VALIDATE */
	$("#frmPolizaManual").validate({
		rules:{
			tc :{ required : true, number : true},
			id_moneda :{ required : true },
			fecha_poliza :{ required : true, date: true },
			tipo_poliza :{ required : true },
			concepto_poliza :{ required : true },
			id_cuenta_contable :{ required : true },
			cargo :{ required : true, number : true},
			abono :{ required : true, number : true},
		},
		messages : {
			tc:{ required : "Es obligatorio llenar los datos", number : "Este campo es númerico"},
			id_moneda :{ required : "Es obligatorio llenar los datos" },
			fecha_poliza :{ required : "Es obligatorio llenar los datos", date: "Formato de fecha obligatorio" },
			tipo_poliza :{ required : "Es obligatorio llenar los datos" },
			concepto_poliza :{ required : "Es obligatorio llenar los datos" },
			id_cuenta_contable :{ required : "Es obligatorio llenar los datos" },
			cargo:{ required : "Es obligatorio llenar los datos", number : "Este campo es númerico"},
			abono:{ required : "Es obligatorio llenar los datos", number : "Este campo es númerico"},
		}
	});
	$("#frmXMLManual").validate({
		rules:{
			monto :{ required : true, number : true},
			uuid :{ required : true },
			rfc :{ required : true },
			metodo_pago :{ required : true },
		},
		messages : {
			monto :{ required : "Es obligatorio llenar los datos", number : "Este campo es númerico"},
			uuid :{ required : "Es obligatorio llenar los datos" },
			rfc :{ required : "Es obligatorio llenar los datos" },
			metodo_pago :{ required : "Es obligatorio llenar los datos" },
		}
	});		
};
pagefunction();
$(document).ready(function() {
	/* Validacion de id de empresa */
	if(localStorage.id_empresa == null){
		_gen.notificacion_min('Error','No existe una empresa asignada para continuar',4);
		window.location.href='/#contabilidad/poliza_manual';
	}
	/*Fin de validacion principal*/
	/* Iniciales 
		- Se reinician variables localStorage para confirmacion de cambio de tipo de cambio y moneda
		- Inicio de datepicker Español
		- Focus inicial en el campo tipo de cambio
		- Carga de catalogo de monedas 
		- Carga de catalogo de cuentas contables 
		- Inicializacion de datatable con el asiento contable local 
	*/

	localStorage.tc = 0;
	localStorage.id_moneda = 101;
	$(".datepickerEs").datepicker({ 
		dateFormat: 'yy-mm-dd',
		language: "es" 
	});
	$('#id_empresa_data').val(localStorage.id_empresa);
	$('#tc').focus();	
	_g.listas.getCatMonedas();
	_g.listas.getCatCuentasContableAfectablesTodas(localStorage.id_empresa,$('#id_cuenta_contable'));
	dao.getAsientoContable(dataAsiento);

	/* Funcion de boton para guardar*/
	$('#btnCrearAsiento').click( function(e){
		dao.CrearPoliza();
		e.preventDefault();
	});

	/* Funcion de boton para salir*/
	$('#btnSalir').click( function(e){
		dao.salir();
		e.preventDefault();
	});

	/* Agregar XML desde formulario*/
	$('#btnAgregarXML').click( function(e){
		if($("#frmXMLManual").valid()){
			var xml = {
				'uuid' : $('#uuid').val(),
				'nombre_entidad' : 'N/A',
				'metodo_pago' : $('#metodo_pago').val(),
				'rfc' : $('#rfc').val(),
				'saldo' : $('#monto').val(),
				'total' : $('#monto').val(),
			};
			dataAsignacionXML.push(xml);
			dao.getXMLAsignados(dataAsignacionXML);
			$('#contAX').html('').append('<i class="fa fa-file-archive-o"></i>&nbsp;'+dataAsignacionXML.length);
			$('#contAXBadge').html('').append(dataAsignacionXML.length);
			dao.limpiarXMLManual();
			_gen.notificacion_min('Exito','Se agrego el XML de forma correcta',2);
			e.preventDefault();			
		}
	});

	$('#btnAddObservaciones').click( function(){
		$('#TextObservaciones').toggle();
	});

	$('#btnNuevaCuenta').click( function(){
		_g.listas.getCatMonedasCustom($('#id_moneda_m'));
		_g.listas.getCatBancosCustom($('#id_banco_m'));
		$('#NuevaCuenta').modal('show');
		$('#cuenta').val('');
	});

	$('#btnAgregarCuenta').click( function(e){
		e.preventDefault();
		if($('#id_entidad').val() != '' && $('#id_catalogo_entidad').val() != '' && $('#id_banco_m').val() != '' && $('#id_moneda_m').val() != '' && $('#cuenta_m').val() != '') {
			if($('#id_entidad').val() == 'clientes'){
				$.post('/api_cont/clientes_cuentas', { id_cliente: $("#id_catalogo_entidad").val(), 
													   id_banco: $("#id_banco_m").val(),
													   id_moneda: $("#id_moneda_m").val(),
													   num_cuenta: $("#cuenta_m").val(),
													   principal: $("#principal_m").val(),})
				.done(function(data) {
					_g.listas.getCuentasClientes($('#id_catalogo_entidad').val(),$('#id_cuenta_bancaria'));			
					_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
					$('#NuevaCuenta').modal('hide');
				}).fail(function(data) {
					_g.listas.getCuentasClientes($('#id_catalogo_entidad').val(),$('#id_cuenta_bancaria'));
				    _gen.notificacion_min('Error', data.responseText,4);
					$('#NuevaCuenta').modal('hide');
				});				
			}if($('#id_entidad').val() == 'proveedores'){
				$.post('/api_cont/proveedores_bancos', { id_proveedor: $("#id_catalogo_entidad").val(), 
													   id_banco: $("#id_banco_m").val(),
													   id_moneda: $("#id_moneda_m").val(),
													   num_cuenta: $("#cuenta_m").val(),
													   principal: $("#principal_m").val(),})
				.done(function(data) {
					_g.listas.getCuentasProveedores($('#id_catalogo_entidad').val(),$('#id_cuenta_bancaria'));			
					_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
					$('#NuevaCuenta').modal('hide');
				}).fail(function(data) {
					_g.listas.getCuentasProveedores($('#id_catalogo_entidad').val(),$('#id_cuenta_bancaria'));
				    _gen.notificacion_min('Error', data.responseText,4);
					$('#NuevaCuenta').modal('hide');
				});
			}if($('#id_entidad').val() == 'empleados'){
				$.post('/api_cont/empleados_cuentas', { id_empleado: $("#id_catalogo_entidad").val(), 
													   id_banco: $("#id_banco_m").val(),
													   id_moneda: $("#id_moneda_m").val(),
													   num_cuenta: $("#cuenta_m").val(),
													   principal: $("#principal_m").val(),})
				.done(function(data) {
					_g.listas.getCuentasEmpleados($('#id_catalogo_entidad').val(),$('#id_cuenta_bancaria'));			
					_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
					$('#NuevaCuenta').modal('hide');
				}).fail(function(data) {
					_g.listas.getCuentasEmpleados($('#id_catalogo_entidad').val(),$('#id_cuenta_bancaria'));
				    _gen.notificacion_min('Error', data.responseText,4);
					$('#NuevaCuenta').modal('hide');
				});

			}
		}else{
			_gen.notificacion_min('Error','Es necesario llenar los datos',4);
		}
	});
});