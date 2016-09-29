_g.listas = {
	getPacientesSucursales :function(id){
		$.ajax({
			url: '/api_admin/pacientes_sucursal/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_paciente').html('');
			$('#id_paciente').append($('<option></option>').text('Seleccione un paciente').val('0'));
			$.each(data.pacientes, function(i) {
				$('#id_paciente').append("<option value=\""+data.pacientes[i].id+"\">"+data.pacientes[i].nombre+" "+data.pacientes[i].paterno+" "+data.pacientes[i].materno+"<\/option>");
			});
			$('#id_paciente').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getPacientesSinCita :function(){
		$.ajax({
			url: '/api_admin/pacientes_sin_cita',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_paciente').html('');
			$('#id_paciente').append($('<option></option>').text('Seleccione un paciente').val('0'));
			$.each(data.pacientes, function(i) {
				$('#id_paciente').append("<option value=\""+data.pacientes[i].id+"\">"+data.pacientes[i].nombre+" "+data.pacientes[i].paterno+" "+data.pacientes[i].materno+"<\/option>");
			});
			$('#id_paciente').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getPacientesSinHistorialClinico :function(){
		$.ajax({
			url: '/api_admin/pacientes_sin_historial_medico',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_paciente').html('');
			$('#id_paciente').append($('<option></option>').text('Seleccione un paciente').val('0'));
			$.each(data.pacientes, function(i) {
				$('#id_paciente').append("<option value=\""+data.pacientes[i].id+"\">"+data.pacientes[i].nombre+" "+data.pacientes[i].paterno+" "+data.pacientes[i].materno+"<\/option>");
			});
			$('#id_paciente').select2().select2("val",'0');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEmpresaBeneficiencia : function(){
		$.ajax({
			url: '/api_admin/empresas_beneficiencias',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_empresa_beneficiencia').html('');
			$('#id_empresa_beneficiencia').append($('<option></option>').text('Seleccione una beneficiencia').val('0'));
			$.each(data, function(i) {
				$('#id_empresa_beneficiencia').append("<option value=\""+data[i].id+"\">"+data[i].id+" "+data[i].nombre+"<\/option>");
			});
			$('#id_empresa_beneficiencia').select2().select2("val",'0');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getPacientesBeneficiadosNoAsignados : function(){
		$.ajax({
			url: '/api_admin/pacientes_tipo_beneficiario/'+$('#id_empresa_beneficiencia').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#lista_pacientes_beneficiados').html('');
			$('#lista_pacientes_beneficiados').append($('<option></option>').text('Seleccione una paciente').val('0'));
			$.each(data, function(i) {
				$('#lista_pacientes_beneficiados').append("<option value=\""+data[i].id+"\">"+data[i].nombre+" "+data[i].paterno+" "+data[i].materno+"<\/option>");
			});
			$('#lista_pacientes_beneficiados').select2().select2("val",'0');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
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
	getEstaciones :function(){
		$.ajax({
			url: '/api_admin/estaciones',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_estaciones').html('');
			$('#id_estaciones').append($('<option></option>').text('Seleccione una estacion').val(''));
			$.each(data, function(i) {
				$('#id_estaciones').append("<option value=\""+data[i].id+"\">"+data[i].id+" "+data[i].nombre+"<\/option>");
			});
			$('#id_estaciones').select2().select2("val",'');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEstacionesAPPs :function(){
		$.ajax({
			url: '/api/estaciones',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_estaciones').html('');
			$('#id_estaciones').append($('<option></option>').text('Seleccione una estacion').val(''));
			$.each(data, function(i) {
				$('#id_estaciones').append("<option value=\""+data[i].id+"\">"+data[i].id+" "+data[i].nombre+"<\/option>");
			});
			$('#id_estaciones').select2().select2("val",'');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getDoctores :function(){
		$.ajax({
			url: '/api_admin/listado_doctores',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_doctores').html('');
			$('#id_doctores').append($('<option></option>').text('Seleccione un doctor').val(''));
			$.each(data, function(i) {
				$('#id_doctores').append("<option value=\""+data[i].id+"\">"+data[i].id+" "+data[i].name+"<\/option>");
			});
			$('#id_doctores').select2().select2("val",'');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getEnfermeros :function(){
		$.ajax({
			url: '/api_admin/listado_enfermeros',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_enfermeros').html('');
			$('#id_enfermeros').append($('<option></option>').text('Seleccione un enfermero').val(''));
			$.each(data, function(i) {
				$('#id_enfermeros').append("<option value=\""+data[i].id+"\">"+data[i].id+" "+data[i].name+"<\/option>");
			});
			$('#id_enfermeros').select2().select2("val",'');			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},



	//INVENTARIO

	getProveedores :function(){
		$.ajax({
			url: '/api_inv/proveedores',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_proveedores').html('');
			$('#id_proveedores').append($('<option></option>').text('Seleccione un proveedor').val(''));
			$.each(data, function(i) {
				$('#id_proveedores').append("<option value=\""+data[i].id+"\">"+data[i].empresa+"<\/option>");
			});
			$('#id_proveedores').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getProveedoresAdi :function(){
		$.ajax({
			url: '/api_inv/proveedores',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_proveedores_adi').html('');
			$('#id_proveedores_adi').append($('<option></option>').text('Seleccione un proveedor').val(''));
			$.each(data, function(i) {
				$('#id_proveedores_adi').append("<option value=\""+data[i].id+"\">"+data[i].empresa+"<\/option>");
			});
			$('#id_proveedores_adi').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getKits :function(){
		$.ajax({
			url: '/api_inv/kits',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_kits').html('');
			$('#id_kits').append($('<option></option>').text('Seleccione un kit').val(''));
			$.each(data, function(i) {
				$('#id_kits').append("<option value=\""+data[i].id+"\">"+data[i].id+" - "+data[i].nombre+"<\/option>");
			});
			$('#id_kits').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getListadoProductosGeneral :function(){
		$.ajax({
			url: '/api_inv/productos',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#listado_productos_g').html('');
			$('#listado_productos_g').append($('<option></option>').text('Seleccione un producto').val(''));
			$.each(data, function(i) {
				$('#listado_productos_g').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			$('#listado_productos_g').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getListadoProductosSinStock :function(){
		$.ajax({
			url: '/api_inv/productos_sin_stock',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_producto').html('');
			$('#id_producto').append($('<option></option>').text('Seleccione un producto').val(''));
			$.each(data, function(i) {
				$('#id_producto').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			$('#id_producto').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getlistadoProductosProveedor : function(id_proveedor,id_pedido){
		$.post('api_inv/productos_de_proveedor',{id_proveedor : id_proveedor,id_pedido : id_pedido})
		.done(function(data) {
			if(data!=""){
				$('#listado_productos').html('');
				$('#listado_productos').append($('<option></option>').text('Seleccione un producto').val(''));
				$.each(data, function(i) {
					$('#listado_productos').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
				});
				$('#listado_productos').select2().select2("val",'');
			}else{
				$('#listado_productos').html('');
				$('#listado_productos').append($('<option></option>').text('No se encontro ningun producto').val(''));
				$('#listado_productos').select2().select2("val",'');
			}							
		});
	},
	getInfoProveedor : function(id,container){
		$.get('api_inv/proveedores/'+id)
		.done(function(data) {
			info = container;
			info.html('');
			info.html(' <div class="col-sm-3 profile-pic"><img src="/img/'+data.logo+'" alt="demo user" style="max-width: 150px;"></div>'+
						'<div class="col-sm-6"><h1>'+data.empresa+'</span><br>'+
							'<small> Responsable: '+data.responsable+'</small></h1>'+
							'<ul class="list-unstyled"><li><p class="text-muted">'+
							'<i class="fa fa-phone"></i>&nbsp;&nbsp;<span class="txt-color-darken">'+data.telefono+'</span>'+
							'</p></li><li>'+
							'<p class="text-muted"><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:simmons@smartadmin">'+data.email+'</a></p></li></ul><br>'+
							'<p class="font-md"><i>Codigo Postal</i></p>'+
							'<p>'+data.codigo_postal+'</p>'+
							'<p class="font-md"><i>Direccion</i></p><p>'+data.direccion+'</p><br>'+
						'</div>');												
		});
	},
	getListCategorias :function(){
		$.ajax({
			url: '/api_inv/categorias',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_categoria').html('');
			$('#id_categoria').append($('<option></option>').text('Seleccione una categoria').val(''));
			$.each(data, function(i) {
				$('#id_categoria').append("<option value=\""+data[i].id+"\">"+data[i].id+" - "+data[i].nombre+"<\/option>");
			});
			$('#id_categoria').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getListasSubCategorias :function(){
		$.ajax({
			url: '/api_inv/subcategorias',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_subcategoria').html('');
			$('#id_subcategoria').append($('<option></option>').text('Seleccione una subcategoria').val(''));
			$.each(data, function(i) {
				$('#id_subcategoria').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			$('#id_subcategoria').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getListUnidadMedida :function(){
		$.ajax({
			url: '/api_inv/unidad_medida',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_unidad_medida').html('');
			$('#id_unidad_medida').append($('<option></option>').text('Seleccione una unidad de medida').val(''));
			$.each(data, function(i) {
				$('#id_unidad_medida').append("<option value=\""+data[i].id+"\">"+data[i].nombre+"<\/option>");
			});
			$('#id_unidad_medida').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getSalidasOrdenes :function(){
		$.ajax({
			url: '/api_inv/entregas_pendientes',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_orden_entrega').html('');
			$('#id_orden_entrega').append($('<option></option>').text('Seleccione una orden').val(''));
			$.each(data, function(i) {
				$('#id_orden_entrega').append("<option value=\""+data[i].id+"\">"+data[i].folio_entrega+" - "+data[i].nombre_usuario+"<\/option>");
			});
			$('#id_orden_entrega').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getListUsuariosOrdenes :function(){
		$.ajax({
			url: '/api_inv/usuarios',
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#id_usuario').html('');
			$('#id_usuario').append($('<option></option>').text('Seleccione un usuario').val(''));
			$.each(data, function(i) {
				$('#id_usuario').append("<option value=\""+data[i].id+"\">"+data[i].role_id+" - "+data[i].name+"<\/option>");
			});
			$('#id_usuario').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
	getlistadoProductosEntrega :function(id){
		$.ajax({
			url: '/api_inv/productos_de_entrega/'+id,
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			$('#listado_productos_g').html('');
			$('#listado_productos_g').append($('<option></option>').text('Seleccione un producto').val(''));
			$.each(data, function(i) {
				$('#listado_productos_g').append("<option value=\""+data[i].id+"\">"+data[i].id+" - "+data[i].nombre+"<\/option>");
			});
			$('#listado_productos_g').select2().select2("val",'');
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente al parecer est&aacute; intentando ingresar informaci&oacute; no valida','gritter-error');
		});
	},
},
_g.dao_g = {
	getObservaciones :function(id_paciente,id_tipo_accion,observacion){
		$.post( "/api_admin/observaciones", { id_paciente: id_paciente, id_tipo_accion: id_tipo_accion, observacion:observacion })
		.done(function( data ) {
			_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
		}).fail(function(data){
			_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de guardar, intente de nuevo.',4);
		});
	},
	getIncidencias :function(id_paciente,id_tipo_accion,observacion){
		$.post( "/api_admin/incidencias", { id_paciente: id_paciente, id_tipo_accion: id_tipo_accion, incidencia:incidencia })
		.done(function( data ) {
			_gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);	
		}).fail(function(data){
			_gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de guardar, intente de nuevo.',4);
		});
	},
	getModalXML :function(id){
			$.ajax({
				url: '/api_cont/archivos_xml/'+id,
				type: 'GET',
				dataType: 'json',
				success: function(data){
					$('#infoXMLModal').modal();
					$('#mdl_uuid, #mdl_data1, #mdl_data2, #mdl_data3').html('');					
					$('#mdl_uuid').append(data.uuid);
					$('#mdl_data1').append('<tr><td><strong>Empresa : </strong></td><td>'+data.id_empresa+'</td></tr>'+
						'<tr><td><strong>Sucursal : </strong></td><td>'+data.id_sucursal+'</td></tr>'+
						'<tr><td><strong>Centro de costos : </strong></td><td>'+data.id_cc+'</td></tr>'+
						'<tr><td><strong>Sub Centro de costos : </strong></td><td>'+data.id_scc+'</td></tr>'+
						'<tr><td><strong>Condiciones de pago : </strong></td><td>'+data.condiciones_de_pago+'</td></tr>'+
						'<tr><td><strong>Descuento : </strong></td><td>'+data.descuento+'</td></tr>'+
						'<tr><td><strong>Fecha : </strong></td><td>'+data.fecha+'</td></tr>'+
						'<tr><td><strong>Folio : </strong></td><td>'+data.folio+'</td></tr>');
					$('#mdl_data2').append('<tr><td><strong>Forma de pago : </strong></td><td>'+data.forma_de_pago+'</td></tr>'+
						'<tr><td><strong>Metodo de pago : </strong></td><td>'+data.metodo_de_pago+'</td></tr>'+
						'<tr><td><strong>Moneda : </strong></td><td>'+data.moneda+'</td></tr>'+
						'<tr><td><strong>Serie : </strong></td><td>'+data.serie+'</td></tr>'+
						'<tr><td><strong>Subtotal : </strong></td><td>'+data.subTotal+'</td></tr>'+
						'<tr><td><strong>Tipo de cambio : </strong></td><td>'+data.tipo_cambio+'</td></tr>'+
						'<tr><td><strong>Tipo de comprobante : </strong></td><td>'+data.tipo_comprobante+'</td></tr>'+
						'<tr><td><strong>Total : </strong></td><td>'+data.total+'</td></tr>');
					$('#mdl_data3').append('<tr><td><strong>Poliza : </strong></td><td>'+data.poliza+'</td></tr>'+
						'<tr><td><strong>Fecha timbrado : </strong></td><td>'+data.fecha_timbrado+'</td></tr>'+
						'<tr><td><strong>Fecha cancelado : </strong></td><td>'+data.fecha_cancelado+'</td></tr>'+
						'<tr><td><strong>Estatus : </strong></td><td>'+data.estatus+'</td></tr>');
				}
			});
		},
}