_g.listas = {
	getEmpresas :function(){
		$.ajax({
			url: '/api_cont/empresas',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_empresa').html('');
			$('#id_empresa').append($('<option></option>').text('Seleccione una empresa').val('0'));
			$.each(data, function(i) {
				$('#id_empresa').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			$('#id_empresa').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresasSelect2Off :function(){
		$.ajax({
			url: '/api_cont/empresas',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_empresa').html('');
			$('#id_empresa').append($('<option></option>').text('Seleccione una empresa').val('0'));
			$.each(data, function(i) {
				$('#id_empresa').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});		
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getDepartamentoNomina :function(){
		$.ajax({
			url: '/api_cont/departamento_nomina',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_departamento_nomina').html('');
			$('#id_departamento_nomina').append($('<option></option>').text('Seleccione un departamento').val('0'));
			$.each(data, function(i) {
				$('#id_departamento_nomina').append("<option value=\""+data[i].departamento+"\">"+data[i].departamento+"<\/option>");
			});
			$('#id_departamento_nomina').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEjerciciosContables :function(id_empresa){
		$.ajax({
			url: '/api_cont/ejercicios_contables/'+id_empresa,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_ajustes_contables').html('');
			$('#id_ajustes_contables').append($('<option></option>').text('Seleccione un ejercicio').val('0'));
			$.each(data, function(i) {
				$('#id_ajustes_contables').append("<option value=\""+data[i].ejercicio+"\">"+data[i].ejercicio+"<\/option>");
			});
			$('#id_ajustes_contables').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresasId :function(div){
		$.ajax({
			url: '/api_cont/empresas',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una empresa').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			div.select2().select2("val",'0');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresasSucursales :function(){
		$.ajax({
			url: '/api_cont/empresas_sucursales/'+$('#id_empresa').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_sucursal').html('');
			$('#id_sucursal').append($('<option></option>').text('Seleccione una sucursal').val('0'));
			$.each(data, function(i) {
				$('#id_sucursal').append("<option value=\""+data[i].id+"\">"+data[i].nombre_corto+"<\/option>");
			});
			$('#id_sucursal').select2().select2("val",'0');
			$('#id_sucursal_filter').show('slow');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresasSucursalesId :function(empresa, div){
		$.ajax({
			url: '/api_cont/empresas_sucursales/'+empresa,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una sucursal').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].nombre_corto+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresasSucursalesCuentas :function(){
		$.ajax({
			url: '/api_cont/empresas_sucursales_cuentas/'+$('#id_sucursal').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_cuenta').html('');
			$('#id_cuenta').append($('<option></option>').text('Seleccione una cuenta').val('0'));
			$.each(data, function(i) {
				$('#id_cuenta').append("<option value=\""+data[i].id+"\">"+data[i].cuenta+"<\/option>");
			});
			$('#id_cuenta').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresasSucursalesCuentasBancarias :function(){
		$.ajax({
			url: '/api_cont/empresas_bancos_sucursal/'+$('#id_sucursal').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_cuenta').html('');
			$('#id_cuenta').append($('<option></option>').text('Seleccione una cuenta').val('0'));
			$.each(data, function(i) {
				$('#id_cuenta').append("<option value=\""+data[i].id+"\">"+data[i].nombre_corto+" - "+data[i].num_cuenta+"<\/option>");
			});
			$('#id_cuenta').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresasCuentasBancarias :function(){
		$.ajax({
			url: '/api_cont/empresas_bancos/'+$('#id_empresa').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_cuenta').html('');
			$('#id_cuenta').append($('<option></option>').text('Seleccione una cuenta').val('0'));
			$.each(data, function(i) {
				$('#id_cuenta').append("<option value=\""+data[i].id_cuenta_banco+"\">"+data[i].nombre_corto+" - "+data[i].num_cuenta+"<\/option>");
			});
			$('#id_cuenta').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatMonedas :function(){
		$.ajax({
			url: '/api_cont/monedas',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_moneda').html('');
			$('#id_moneda').append($('<option></option>').text('Seleccione una moneda').val('0'));
			$.each(data, function(i) {
				$('#id_moneda').append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].moneda+"<\/option>");
			});
			$('#id_moneda').select2().select2("val",'101');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatMonedasCustom :function(div){
		$.ajax({
			url: '/api_cont/monedas',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una moneda').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].moneda+"<\/option>");
			});
			div.select2().select2("val",'101');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatCuentasContable :function(){
		$.ajax({
			url: '/api_cont/cuentas_contable',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_cuenta_contable').html('');
			$('#id_cuenta_contable').append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				$('#id_cuenta_contable').append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");
			});
			$('#id_cuenta_contable').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatCuentasContableCuztom :function(id,div){
		$.ajax({
			url: '/api_cont/cuentas_contable/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatCuentasContableAfectablesCuztom :function(id,div){
		$.ajax({
			url: '/api_cont/cuentas_contables_afectables/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatCuentasContableAfectablesTodas :function(id,div){
		$.ajax({
			url: '/api_cont/cuentas_contables_afectables_todas/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatCuentasContableAfectablesInahbilitadasCuztom :function(id,div){
		$.ajax({
			url: '/api_cont/cuentas_contables_afectables_m/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				if(data[i].afectable == 'SI'){
					div.append("<option disabled='disabled' value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");					
				}if(data[i].afectable == 'NO'){
					div.append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");					
				}
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatCuentasContableParametrizacion :function(id){
		// 	url: '/api_cont/cuentas_contable/'+id,
		$.ajax({
			url: '/api_cont/cuentas_contables_afectables_m/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_cuenta_contable_i, #id_cuenta_contable_im, #id_cuenta_contable_imf, #id_cuenta_contable_e, #id_cuenta_contable_ncf, #id_cuenta_contable_ncc, #id_cuenta_contable_nomina, #id_cuenta_contable_nomina_excepcion').html('');
			$('#id_cuenta_contable_i, #id_cuenta_contable_im, #id_cuenta_contable_imf, #id_cuenta_contable_e, #id_cuenta_contable_ncf, #id_cuenta_contable_ncc, #id_cuenta_contable_nomina, #id_cuenta_contable_nomina_excepcion').append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				if(data[i].afectable == 'SI'){
					$('#id_cuenta_contable_i, #id_cuenta_contable_im, #id_cuenta_contable_imf, #id_cuenta_contable_e, #id_cuenta_contable_ncf, #id_cuenta_contable_ncc, #id_cuenta_contable_nomina, #id_cuenta_contable_nomina_excepcion').append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");
				}if(data[i].afectable == 'NO'){
					$('#id_cuenta_contable_i, #id_cuenta_contable_im, #id_cuenta_contable_imf, #id_cuenta_contable_e, #id_cuenta_contable_ncf, #id_cuenta_contable_ncc, #id_cuenta_contable_nomina, #id_cuenta_contable_nomina_excepcion').append("<option disabled value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");					
				}
			});
			$('#id_cuenta_contable_i, #id_cuenta_contable_im, #id_cuenta_contable_imf, #id_cuenta_contable_e, #id_cuenta_contable_ncf, #id_cuenta_contable_ncc, #id_cuenta_contable_nomina, #id_cuenta_contable_nomina_excepcion').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCuentasContablesEmpresas :function(id,div){
		$.ajax({
			url: '/api_cont/cuentas_contable/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCuentasContablesEmpresasCodigo :function(id,div){
		$.ajax({
			url: '/api_cont/cuentas_contable/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].codigo+"\">"+data[i].codigo+" "+data[i].cuenta_contable+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatBancos :function(){
		$.ajax({
			url: '/api_cont/bancos',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_banco').html('');
			$('#id_banco').append($('<option></option>').text('Seleccione un banco').val('0'));
			$.each(data, function(i) {
				$('#id_banco').append("<option value=\""+data[i].id+"\">"+data[i].clave+" "+data[i].nombre_corto+"<\/option>");
			});
			$('#id_banco').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getCatBancosCustom :function(div){
		$.ajax({
			url: '/api_cont/bancos',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione un banco').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].clave+" "+data[i].nombre_corto+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getBancosEmpresas :function(id, div){
		$.ajax({
			url: '/api_cont/bancos_empresas/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta contable').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].num_cuenta+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getClientesEmpresa :function(id, div){
		$.ajax({
			url: '/api_cont/clientes/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione un cliente').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getProveedoresEmpresa :function(id, div){
		$.ajax({
			url: '/api_cont/proveedores/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione un proveedor').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getEmpleadosEmpresa :function(id, div){
		$.ajax({
			url: '/api_cont/empleados/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione un empleado').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getCuentasClientes :function(id, div){
		$.ajax({
			url: '/api_cont/cuentas_clientes/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione un cuenta').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].num_cuenta+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getCuentasProveedores :function(id, div){
		$.ajax({
			url: '/api_cont/cuentas_proveedores/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione un cuenta').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].num_cuenta+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getCuentasEmpleados :function(id, div){
		$.ajax({
			url: '/api_cont/empleados_cuentas/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione un cuenta').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].num_cuenta+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getConceptosDispercion :function(id, div){
		$.ajax({
			url: '/api_cont/dispercion/ingresos/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			if(data.length != 0){
				$('#AsignarCuentasConceptos').show('slow');
				div.html('');
				div.append($('<option></option>').text('Seleccione un concepto').val('0'));
				$.each(data, function(i) {
					div.append("<option value=\""+data[i].id_datatable+"\">"+data[i].id_datatable+" - "+data[i].descripcion+"<\/option>");
				});
				div.select2().select2("val",'0');							
			}else{
				_g.listas.getConceptosDispercionE($('#id_empresa').val(),$('#id_concepto_dispercion'));
			}
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getConceptosDispercionE :function(id, div){
		$.ajax({
			url: '/api_cont/dispercion/egresos/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			if(data.length != 0){				
				$('#AsignarCuentasConceptos').show('slow');
				div.html('');
				div.append($('<option></option>').text('Seleccione un concepto').val('0'));
				$.each(data, function(i) {
					div.append("<option value=\""+data[i].id_datatable+"\">"+data[i].id_datatable+" - "+data[i].descripcion+"<\/option>");
				});
				div.select2().select2("val",'0');
			}else{
				$('#AsignarCuentasConceptos').hide();
				// _g.listas.getConceptosDispercionN($('#id_empresa').val(),$('#id_concepto_dispercion'));
			}							
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getCatCuentasContableId :function(id, div){
		$.ajax({
			url: '/api_cont/dispercion/cuentas/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id+"\">"+data[i].id+" - "+data[i].cuenta_contable+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getCatCuentasConceptosId :function(id, div){
		$.ajax({
			url: '/api_cont/dispercion/cuentas_concepto/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione una cuenta').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id_cuenta+"\">"+data[i].id_cuenta+" - "+data[i].cuenta+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getCatCuentasOrigen :function(div, id){
		$.ajax({
			url: '/api_cont/cuentas_contables_origen/'+storage.banco_empresa,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione origen').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id_cuenta_bancaria+"\">"+data[i].codigo+" // "+data[i].num_cuenta+"<\/option>");
			});
			div.select2().select2("val",id);
			$.ajax({
				url: '/api_cont/informacion_cuenta/'+$('#id_cuenta_origen').val(),
				type: 'GET',
				dataType: 'json',
				success: function(data){
					$('#moneda').val(data.moneda);
				}
			});			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},

	getCatCuentasDestino :function(div,id_origen){
		var parametros = {
			'id_cuenta_origen' : id_origen,
			'id_empresa' : storage.banco_empresa
		}
		$.ajax({
			url: '/api_cont/cuentas_contables_destino',
			data: parametros,
			type: 'POST',
			dataType: 'json',
		}).done(function(data){
			div.html('');
			div.append($('<option></option>').text('Seleccione destino').val('0'));
			$.each(data, function(i) {
				div.append("<option value=\""+data[i].id_cuenta_bancaria+"\">"+data[i].codigo+" // "+data[i].num_cuenta+"<\/option>");
			});
			div.select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},


	/* FUNCIONES PARA ADMINISTRADOR */
	getSucursales :function(){
		$.ajax({
			url: '/api_admin/sucursales',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_sucursal').html('');
			$('#id_sucursal').append($('<option></option>').text('Seleccione una sucursal').val(''));
			$.each(data, function(i) {
				$('#id_sucursal').append("<option value=\""+data[i].id+"\">"+data[i].id+" "+data[i].nombre+"<\/option>");
			});
			$('#id_sucursal').select2().select2("val",'');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
}