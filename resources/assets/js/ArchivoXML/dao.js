/*  FUNCTIONS DATATABLE AND MODALS  */

_g.dao = {
	/** Validar Parametrización **/
	getValidParametrizacion :function(){

		$.ajax({
			url: '/api_cont/validar_parametrizacion/'+$('#id_empresa_data').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function (data){
			if(data.impuestos != 0 || data.ingresos != 0 || data.egresos != 0 || data.ncc != 0 || data.ncf != 0 || data.nomina != 0){
				$('#btnProcesar').show('slow');
			}else{
				$('#btnProcesar').hide();
			}				
		});
	},

	getXML :function(){
		$.ajax({
			url: '/api_cont/archivos_xml',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var datelist = data;var table = $('#tblXML');
				var columnDefs = [{"aTargets" : [ 0 ], "bVisible" : false, "mData" : "id"},
				    	          {"aTargets" : [ 1 ], "mData" : "uuid"},
				    	          {"aTargets" : [ 2 ], "mData" : "estatus_sat"},
				    	          {"aTargets" : [ 3 ], "mData" : "poliza"},
				    	          {"aTargets" : [ 4 ], "mData" : "id_entidad"},
				    	          {"aTargets" : [ 5 ], "mData" : "poliza"},
				    	          {"aTargets" : [ 6 ], "mData" : "poliza"},
				    	          {"aTargets" : [ 7 ], "mData" : "total"},
				    	          {"aTargets" : [ 8 ], "mData" : "f_timbrado"},
				    	          {"aTargets" : [ 9 ], "mData" : "f_importado"},
				    	          {"aTargets" : [ 10 ], "mData" : "fecha_cancelado"},
				    	          {
									"aTargets": [ 11 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" onclick="_g.dao.getModalXML(' + o.id + ')">' + '<i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;<a class="btn btn-sm btn-success" onclick="_g.dao.getModificarDatos('+o.id+')"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarDatos('+o.id+')"><i class="glyphicon glyphicon-trash"></i></a>&nbsp; '; 
									}
								  }];
				// $("#tblXML").DataTable({
			 //        'aaData' : datelist,
			 //        "autoWidth" : true,
				// 	"aoColumnDefs" : columnDefs,
			 //        "rowCallback": function( row, datelist ) {
			 //            if ( $.inArray(datelist.DT_RowId, selectedRows) !== -1 ) {
			 //                $(row).addClass('success');
			 //            }
			 //        }
			 //    });

				// $('#tblXML tbody').on('click', 'tr', function (e) {
			 //        _g.currentDates = $('#tblXML').dataTable().fnGetData(e.target.parentNode);
			 //        var id = _g.currentDates['id'];
			 //        var index = $.inArray(id, selectedRows);				 
			 //        if ( index === -1 ) {
			 //            selectedRows.push( id );
			 //        } else {
			 //            selectedRows.splice( index, 1 );
			 //        }				 
			 //        $(this).toggleClass('success');
			 //        console.log(selectedRows);
			 //    });
				_gen.setTableNE(table,columnDefs,datelist);
			}
		});
	},
	getXMLAvanzada :function(){
		var parametros = {
                "id_empresa" : $('#id_empresa').val(),
                "id_sucursal" : $('#id_sucursal').val(),
                "id_cc" : $('#id_centro_costos').val(),
                "id_scc" : $('#select_scc').val(),
                "desde" : $('#desde').val(),
                "hasta" : $('#hasta').val(),
                "tipo_xml" : $('#id_tipo_xml').val(),
        };
		$.ajax({
			data : parametros,
			url: '/api_cont/archivos_xml_avanzada',
			type: 'POST',
			dataType: 'json',
			success: function(data){
				if(data.length != 0){
					var datelist = data;var table = $('#tblXML');
					$.each(data, function(i) {
						if(data[i].origen == 'Ingreso'){
							data[i].label_rfc = data[i].rfc_cliente;
							data[i].label_nombre = data[i].nombre_cliente;							
						}if(data[i].origen == 'Egreso'){
							data[i].label_rfc = data[i].rfc_prov;
							data[i].label_nombre = data[i].nombre_prov;							
						}if(data[i].origen == 'NCC'){
							data[i].label_rfc = data[i].rfc_ncc;
							data[i].label_nombre = data[i].nombre_ncc;	
						}if(data[i].origen == 'NCF'){
							data[i].label_rfc = data[i].rfc_ncf;
							data[i].label_nombre = data[i].nombre_ncf;	
						}if(data[i].origen == 'Nomina'){
							data[i].label_rfc = data[i].rfc_nomina;
							data[i].label_nombre = data[i].nombre_nomina;	
						}
					});
					var columnDefs = [{"aTargets" : [ 0 ], 
										"mData" : null,
										"mRender": function (o){
											if(o.debe_ajuste_pesos != 0){
												return '<strong>' +'Ajuste Cargado por: ' +accounting.formatMoney(o.debe_ajuste_pesos)+ '</strong>';
											}
											if(o.haber_ajuste_pesos != 0){
												return '<strong>' +'Ajuste Abonado por:' +accounting.formatMoney(o.haber_ajuste_pesos)+ '</strong>';
											}
											if(o.debe_ajuste_pesos == 0 || $haber_ajuste_pesos ==0){
												return "";
											}
										}},
					    	          {"aTargets" : [ 1 ], "mData" : "uuid"},
					    	          {"aTargets" : [ 2 ], "mData" : "estatus_sat"},
					    	          {"aTargets" : [ 3 ], "mData" : "poliza"},
					    	          {"aTargets" : [ 4 ], "mData" : "label_nombre"},
					    	          {"aTargets" : [ 5 ], "mData" : "label_rfc"},
					    	          {"aTargets" : [ 6 ], "mData" : "poliza"},
					    	          {"aTargets" : [ 7 ],
					    	           "mData" : null,
					    	       		"mRender": function (o){
					    	       			if(o.moneda == 'USD' || o.moneda == 'usd' || o.moneda == 'DLS' || o.moneda == 'dls'){
					    	       			return '<strong>'+accounting.formatMoney(o.total_plz * parseFloat(o.tipo_cambio))+'</strong>';
					    	       			}else{return accounting.formatMoney(o.total_plz);}
					    	       		}},
					    	          {"aTargets" : [ 8 ], "mData" : "f_timbrado"},
					    	          {"aTargets" : [ 9 ], "mData" : "f_importado"},
					    	          {"aTargets" : [ 10 ], "mData" : "fecha_cancelado"},
					    	          {
										"aTargets": [ 11 ],
										"mData": null,
										"mRender": function (o) { 
											return '<a class="btn btn-sm btn-success" onclick="_g.dao.getModalXML(' + o.id + ')"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;'+
												   '<a class="btn btn-sm btn-success" onclick="_g.dao.getModificarDatos('+o.id+')"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarDatos('+o.id+')"><i class="glyphicon glyphicon-trash"></i></a>'+
												   '<a class="btn btn-sm btn-primary" onclick="_g.dao.getModalPolizaConceptos(' + o.id + ')"><i class="glyphicon glyphicon-file"></i></a>&nbsp;'; 
										}
									  }];
					_gen.setTableNE(table,columnDefs,datelist);
					//_gen.setDataTable(table,columnDefs,datelist);
					$('#wdtTable').show();						
				}else{
					_gen.notificacion_min('Error', 'No se encontraron registros con esos filtros',4);
				}
			}
		});
	},


    getEliminarDatos :function(id){
                $.ajax({
                    url: '/api_cont/archivos_xml/'+id,
                    type: 'DELETE',
                    dataType: 'json',           
                }).done(function(data){
                    _g.dao.getXMLAvanzada();
                    _gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
                }).fail(function(data){
                    _gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
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

	getModalPoliza :function(id){
		$.ajax({
			url: '/api_cont/poliza_diario/'+id,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('#infoPolizaModal').modal();
				$('#plz_data, #plz_data1, #plz_data2').html('');
				if(data.xml.id_sucursal == 0){
					data.xml.id_sucursal = "NA";
				}if(data.xml.id_cc == 0){
					data.xml.id_cc = "NA";
				}if(data.xml.id_scc == 0){
					data.xml.id_scc = "NA";
				}				
				$('#plz_data').append('<tr><td><strong>Empresa :</strong></td>'+
								'<td colspan="3">'+data.xml.nombre+'</td>'+
								'<td><strong>RFC :</strong></td>'+
								'<td colspan="3">'+data.xml.rfc+'</td></tr>'+
							'<tr><td><strong>Folio :</strong></td>'+
								'<td>'+data.xml.poliza+'</td>'+
								'<td><strong>Fecha :</strong></td>'+
								'<td>'+data.xml.fecha+'</td>'+
								'<td><strong>Moneda :</strong></td>'+
								'<td>'+data.xml.moneda+'</td>'+
								'<td><strong>TC :</strong></td>'+
								'<td>'+data.xml.tipo_comprobante+'</td></tr>'+
							'<tr><td><strong>Observaciones :</strong></td>'+
								'<td colspan="7"></td></tr>'+
							'<tr><td><strong>Sucursal :</strong></td>'+
								'<td colspan="2">'+data.xml.id_sucursal+'</td>'+
								'<td><strong>CCostos :</strong></td>'+
								'<td colspan="2">'+data.xml.id_cc+'</td>'+
								'<td><strong>SCCostos :</strong></td>'+
								'<td colspan="1">'+data.xml.id_scc+'</td></tr>'+
							'<tr><td><strong>Origen de Poliza :</strong></td>'+
								'<td colspan="3">'+data.xml.origen+'</td>'+
								'<td><strong>UUID :</strong></td>'+
								'<td colspan="3">'+data.xml.uuid+'</td></tr>');
				$('#plz_data1').append('<tr><td></td><td># Cuenta</td><td> Descripción</td><td> Debe</td><td> Haber</td></tr>');
				var totalXml = '';var totalXml2 = '';var TotalDebe = '';var TotalHaber = '';
				var descuento = '';var descuento2 = '';var AjustePesos = '';var SubtotalXml = '';var ImpuestosTraslados = '';var ImpuestosRetenidos = '';var ImpuestosLocales = '';
				$.each(data.conceptos_pd, function(i) {
					if(data.conceptos_pd[i].concepto == 'TOTAL DEL XML' && data.conceptos_pd[i].tipo_ne == 'Nacional' && data.xml.rfc != 'XEXX010101000'){
						totalXml = '<tr><td><strong>Total del XML : </strong></td><td>'+data.conceptos_pd[i].codigo_cuenta_contable+'</td><td>'+data.conceptos_pd[i].cuenta_contable+'</td>';
						if(data.conceptos_pd[i].origen == 'Ingreso' || data.conceptos_pd[i].origen == 'NCF'){
							totalXml2 = '<td>'+data.xml.total+'</td><td></td></tr>';
							SubtotalXml = '<tr><td><strong>SUBTOTAL : </strong></td><td></td><td></td><td></td><td>'+data.xml.subTotal+'</td></tr>';
							ImpuestosTraslados = '<tr><td><strong>IMPUESTOS TRASLADOS : </strong></td><td></td><td></td><td></td><td>'+data.xml.impuesto_trasladados+'</td></tr>';
							ImpuestosRetenidos = '<tr><td><strong>IMPUESTOS RETENIDOS : </strong></td><td></td><td></td><td>'+data.xml.impuestos_retenidos+'</td><td></td></tr>';
							ImpuestosLocales = '<tr><td><strong>IMPUESTOS LOCALES : </strong></td><td></td><td></td><td>'+data.xml.impuestos_locales+'</td><td></td></tr>';
						}else{
							totalXml2 = '<td></td><td>'+data.xml.total+'</td></tr>';
							SubtotalXml = '<tr><td><strong>SUBTOTAL : </strong></td><td></td><td></td><td>'+data.xml.subTotal+'</td><td></td></tr>';
							ImpuestosTraslados = '<tr><td><strong>IMPUESTOS TRASLADOS : </strong></td><td></td><td></td><td>'+data.xml.impuesto_trasladados+'</td><td></td></tr>';
							ImpuestosRetenidos = '<tr><td><strong>IMPUESTOS RETENIDOS : </strong></td><td></td><td></td><td></td><td>'+data.xml.impuestos_retenidos+'</td></tr>';
							ImpuestosLocales = '<tr><td><strong>IMPUESTOS LOCALES : </strong></td><td></td><td></td><td>'+data.xml.impuestos_locales+'</td><td></td></tr>';
						} 
					}
					if(data.conceptos_pd[i].concepto == 'DESCUENTO' && data.conceptos_pd[i].tipo_ne == 'Nacional' && data.xml.rfc != 'XEXX010101000'){
						descuento = '<tr><td><strong>DESCUENTO : </strong></td><td>'+data.conceptos_pd[i].codigo_cuenta_contable+'</td><td>'+data.conceptos_pd[i].cuenta_contable+'</td>';
						if(data.conceptos_pd[i].origen == 'Ingreso' || data.conceptos_pd[i].origen == 'NCF'){
							descuento2 = '<td>'+data.xml.descuento+'</td><td></td></tr>';
						}else{
							descuento2 = '<td></td><td>'+data.xml.descuento+'</td></tr>';
						} 
					}
					if(data.conceptos_pd[i].concepto == 'AJUSTE A PESOS'){
						AjustePesos = '<tr><td><strong>AJUSTE A PESOS : </strong></td><td>'+data.conceptos_pd[i].codigo_cuenta_contable+'</td><td>'+data.conceptos_pd[i].cuenta_contable+'</td><td></td><td></td></tr>';
					}
				});
				$('#plz_data1').append(totalXml.concat(totalXml2));
				if(data.xml.impuesto_trasladados != 0){
					$('#plz_data1').append(ImpuestosTraslados);					
				}if(data.xml.impuestos_retenidos != 0){
					$('#plz_data1').append(ImpuestosRetenidos);
				}if(data.xml.impuestos_locales != 0){
					$('#plz_data1').append(ImpuestosLocales);
				}$('#plz_data1').append(descuento.concat(descuento2));
				$('#plz_data1').append(AjustePesos);
				$('#plz_data1').append(SubtotalXml);
				if(data.xml.origen == 'Ingreso' || data.xml.origen == 'NCF'){
					TotalDebe =  parseFloat(data.xml.total)+parseFloat(data.xml.impuestos_retenidos)+parseFloat(data.xml.descuento);
					TotalHaber =  parseFloat(data.xml.impuesto_trasladados)+parseFloat(data.xml.impuestos_locales)+parseFloat(data.xml.subTotal);
				}else{
					TotalDebe =  parseFloat(data.xml.impuesto_trasladados)+parseFloat(data.xml.impuestos_locales)+parseFloat(data.xml.subTotal);
					TotalHaber =  parseFloat(data.xml.total)+parseFloat(data.xml.impuestos_retenidos)+parseFloat(data.xml.descuento);
				}				
				$('#plz_data2').append('<tr><td><strong>Total Debe : </strong></td><td>'+TotalDebe+'</td></tr><tr><td><strong>Total Haber : </strong></td><td>'+TotalHaber+'</td></tr>');
			}
		});
	},

	getModalPolizaConceptos :function(id){
		$.ajax({
			url: '/api_cont/poliza_diario_conceptos/'+id,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('#infoPolizaModal').modal();
				$('#plz_data, #plz_data1, #plz_data2').html('');
				if(data.xml.id_sucursal == 0){
					data.xml.id_sucursal = "NA";
				}if(data.xml.id_cc == 0){
					data.xml.id_cc = "NA";
				}if(data.xml.id_scc == 0){
					data.xml.id_scc = "NA";
				}				
				$('#plz_data').append('<tr><td><strong>Empresa :</strong></td>'+
								'<td colspan="3">'+data.xml.nombre+'</td>'+
								'<td><strong>RFC :</strong></td>'+
								'<td colspan="3">'+data.xml.rfc+'</td></tr>'+
							'<tr><td><strong>Folio :</strong></td>'+
								'<td>'+data.xml.poliza+'</td>'+
								'<td><strong>Fecha :</strong></td>'+
								'<td>'+data.xml.fecha+'</td>'+
								'<td><strong>Moneda :</strong></td>'+
								'<td>'+data.xml.moneda+'</td>'+
								'<td><strong>TC :</strong></td>'+
								'<td>'+data.xml.tipo_cambio+'</td></tr>'+
							'<tr><td><strong>Observaciones :</strong></td>'+
								'<td colspan="7"></td></tr>'+
							'<tr><td><strong>Sucursal :</strong></td>'+
								'<td colspan="2">'+data.xml.id_sucursal+'</td>'+
								'<td><strong>CCostos :</strong></td>'+
								'<td colspan="2">'+data.xml.id_cc+'</td>'+
								'<td><strong>SCCostos :</strong></td>'+
								'<td colspan="1">'+data.xml.id_scc+'</td></tr>'+
							'<tr><td><strong>Origen de Poliza :</strong></td>'+
								'<td colspan="3">'+data.xml.origen+'</td>'+
								'<td><strong>UUID :</strong></td>'+
								'<td colspan="3">'+data.xml.uuid+'</td></tr>');
				$('#plz_data1').append('<tr><td><strong># Cuenta</strong></td><td><strong> Descripción </strong></td><td><strong>Concepto</strong></td><td><strong> Debe </strong></td><td><strong> Haber </strong></td></tr>');
				var TotalDebe  = 0;					
				var TotalHaber = 0;	
				var TipoCambio = 0;
				var imp_nom    = 0;
				var desc 	   = 0;
				/* Ejemplos para usar la libreria accounting y jquery.number
				accounting.formatMoney(12345678); 					--> Outputs: $12,345,678.00   	https://github.com/openexchangerates/accounting.js.git
				accounting.formatMoney(4999.99, "€", 2, ".", ",");  --> Outputs: €4.999,99
				$.number( 5020.2364 );            					--> Outputs: 5,020
				$.number( 5020.2364, 2 );         					--> Outputs: 5,020.24			https://github.com/customd/jquery-number.git
				*/

				if(data.xml.moneda == 'USD' || data.xml.moneda == 'dlls' || data.xml.moneda == 'dolar' || data.xml.moneda =='dolar americano' || data.xml.moneda == 'dolar estadounidence' || data.xml.moneda == 'usd'){
					var TipoCambio = data.xml.tipo_cambio;
				}else{
					var TipoCambio = 1;
				}
				if(data.xml.origen == 'Nomina'){

					if (data.nomina_conceptos.length == 0){
					$('#plz_data1').append('<tr><td colspan="5"><h1><span class="label label-danger">Ups! Hay que parametrizar los datos</span></h1></td></tr>');
					}else{

						$('#plz_data1').append('<tr><td> '+data.nomina.num_cta_poliza+' </td><td> '+data.nomina.nom_cta_poliza+' </td><td></td><td> </td> <td> '+$.number(data.xml.total * parseFloat(TipoCambio),2)+' </td></tr>');						

					$.each(data.nomina_conceptos, function(i){
						if(data.nomina_conceptos[i].tipo == 'Percepcion'){
							if(data.nomina_conceptos[i].importe_excento < 0 || data.nomina_conceptos[i].importe_gravado < 0){
									$imp_nom = (data.nomina_conceptos[i].importe_excento + data.nomina_conceptos[i].importe_gravado) * -1;
								}
							if(data.nomina_conceptos[i].importe_excento > 0){
								$imp_nom = data.nomina_conceptos[i].importe_excento;
							}else{
								$imp_nom  = data.nomina_conceptos[i].importe_gravado;
							}
							$('#plz_data1').append('<tr><td>'+data.nomina_conceptos[i].no_cuenta+'</td><td>'+data.nomina_conceptos[i].nombre_cta+'</td><td>'+data.nomina_conceptos[i].concepto+'</td><td>'+$.number($imp_nom * parseFloat(TipoCambio),2)+'</td> <td></td></tr>');
						}
						if(data.nomina_conceptos[i].tipo == 'Deduccion'){
							if(data.nomina_conceptos[i].importe_excento > 0){
								$imp_nom = data.nomina_conceptos[i].importe_excento;
							}else{
								$imp_nom  = data.nomina_conceptos[i].importe_gravado;
							}
							$('#plz_data1').append('<tr><td>'+data.nomina_conceptos[i].no_cuenta+'</td><td>'+data.nomina_conceptos[i].nombre_cta+'</td><td>'+data.nomina_conceptos[i].concepto+'</td><td></td> <td>'+$.number($imp_nom * parseFloat(TipoCambio),2)+'</td></tr>');
							}
						}
					);
						if(data.xml.ajuste_a_pesos > 0){
							$('#plz_data1').append('<tr><td>'+data.xml.ajuste_cta+'</td><td>'+data.xml.ajuste_cta_nombre+'</td><td></td>'
								+(data.xml.dh_ajuste == 'Haber' ? 
									'<td></td> <td>'+$.number(data.xml.ajuste_a_pesos * parseFloat(TipoCambio),2)+'</td></tr>'
									:'<td>'+$.number(data.xml.ajuste_a_pesos * parseFloat(TipoCambio),2)+'<td></td></tr>'));
									}
					$('#plz_data2').append('<tr><td colspan="6"></td><td><strong>Total Debe</strong></td><td><strong>Total Haber</strong></td></tr>');
					$('#plz_data2').append('<tr><td colspan="6"></td><td>'+accounting.formatMoney(data.xml.total_plz * parseFloat(TipoCambio))+'</td><td>'+accounting.formatMoney(data.xml.total_plz * parseFloat(TipoCambio))+'</td></tr>');
					}
				}
					/*POLIZAS DIFERENTES A NÓMINA; INGRESO/EGRESO/NCC/NCF */
				if(data.xml.origen != 'Nomina'){
					if(data.conceptos_pd.length == 0 || data.conceptos_pd == '' || data.xml.cont != data.conceptos_pd.length){
					$('#plz_data1').append('<tr><td colspan="5"><h1><span class = "label label-danger">Ups! Hay que parametrizar los datos</span></h1></td></tr>');

				 }else{
				 //INICIO ASIENTO CONTABLE
				$('#plz_data1').append('<tr><td>'+ data.xml.cta_total +'</td><td>'+ data.xml.cta_total_nom +'</td><td></td>' 
					+(data.xml.origen == 'Ingreso' || data.xml.origen == 'NCF' ?// Si es ingreso o NCF, entonces...
					 '<td>'+$.number(data.xml.total * parseFloat(TipoCambio),2)+'</td> <td></td> </tr>' //Pinta izquierda valor
					 : '<td></td> <td>'+$.number(data.xml.total * parseFloat(TipoCambio),2)+'</td> </tr>')//EN CASO DE NO CUMPLIR CONDICIÓN, Se entiende que es Egreso o NCC... por lo tanto Pinta derecha valor
					 );					
					/*-----------------------------------DESCUENTOS-----------------------------------------------------*/
					if(data.xml.descuento > 0){
						$('#plz_data1').append('<tr><td> 4700505 </td><td> Desc., Dev. y Reb. S/Ventas 16%</td> <td></td>'
							+(data.xml.origen == 'Ingreso' || data.xml.origen == 'NCF' ?
							'<td>'+data.xml.descuento * parseFloat(TipoCambio)+'</td> <td></td></tr>' 
							:'<td></td> <td>'+data.xml.descuento * parseFloat(TipoCambio)+'</td> </tr>'));
					}
					/*-------------------------------------FIN DESCUENTOS---------------------------------------------------*/	
					/*CONCEPTOS*/
					$.each(data.conceptos_pd, function(i) {
						if(data.xml.origen == 'Ingreso' || data.xml.origen == 'NCF'){
							if(data.conceptos_pd[i].importe < 0){
						$('#plz_data1').append('<tr><td>'+data.conceptos_pd[i].codigo+'</td><td>'+data.conceptos_pd[i].cuenta_contable+'</td><td>'+data.conceptos_pd[i].descripcion+'</td><td>'+$.number(data.conceptos_pd[i].importe * parseFloat(TipoCambio),2)+'</td> <td></td></tr>');
							}else{
							$('#plz_data1').append('<tr><td>'+data.conceptos_pd[i].codigo+'</td><td>'+data.conceptos_pd[i].cuenta_contable+'</td><td>'+data.conceptos_pd[i].descripcion+'</td><td> </td> <td>'+$.number(data.conceptos_pd[i].importe * parseFloat(TipoCambio),2)+'</td></tr>');						
							}
						}
						if(data.xml.origen == 'Egreso' || data.xml.origen == 'NCC'){
						// Identifico si el importe de un concepto viene en negativo y lo pongo del lado del lado contrario => éste número se guardó en positivo en la variable $descuento_detalle en ArchivosxmlController línea 687
						//y en la línea 962 se suma al total del XML e Impuestos Retenidos
						if(data.conceptos_pd[i].importe < 0){
							$('#plz_data1').append('<tr><td>'+data.conceptos_pd[i].codigo+'</td><td>'+data.conceptos_pd[i].cuenta_contable+'</td><td>'+data.conceptos_pd[i].descripcion+'</td><td> </td> <td>'+$.number(-1 * data.conceptos_pd[i].importe * parseFloat(TipoCambio),2)+'</td></tr>');												
						}else{
							$('#plz_data1').append('<tr><td>'+data.conceptos_pd[i].codigo+'</td><td>'+data.conceptos_pd[i].cuenta_contable+'</td><td>'+data.conceptos_pd[i].descripcion+'</td><td>'+$.number(data.conceptos_pd[i].importe * parseFloat(TipoCambio),2)+'</td> <td></td></tr>');						
						}
							//}
						}
					});
					/*IMPUESTOS*/
					if(data.impuestos.length != 0 || data.impuestos != ''){
						$.each(data.impuestos, function(i) {
							if(data.xml.origen == 'Ingreso' || data.xml.origen == 'NCF'){
								/*Para el caso de Ingreso, solo se toman en cuenta los impuestos Trasladados, Locales y Retenidos, para el caso de los Locales y Trasladados siempre se posicionan en el lado del HABER para origen = Ingreso*/
								if (data.impuestos[i].tipo_impuesto == 'Impuesto Trasladado (IT)' || data.impuestos[i].tipo_impuesto == 'Impuesto Local Transladado (ILT)'){
									if(data.impuestos[i].importe > 0){
									$('#plz_data1').append('<tr><td>'+data.impuestos[i].codigo+'</td><td>'+data.impuestos[i].cuenta_contable+'</td> <td></td> <td></td> <td>'+$.number(data.impuestos[i].importe * parseFloat(TipoCambio),2)+'</td></tr>');
								}
								}if (data.impuestos[i].tipo_impuesto == 'Impuesto Retenidos (IR)' || data.impuestos[i].tipo_impuesto == 'Impuesto Local Retenido (ILR)'){
									$('#plz_data1').append('<tr><td>'+data.impuestos[i].codigo+'</td><td>'+data.impuestos[i].cuenta_contable+'</td> <td></td> <td>'+$.number(data.impuestos[i].importe * parseFloat(TipoCambio),2)+'</td> <td></td></tr>');						
								}
							}
							if(data.xml.origen == 'Egreso' || data.xml.origen == 'NCC'){
								//Se ponen en la misma condición, el tipo de impuesto Trasladado y el local trasladado porque van en la misma columna
								if (data.impuestos[i].tipo_impuesto == 'Impuesto Trasladado (IT)' || data.impuestos[i].tipo_impuesto == 'Impuesto Local Transladado (ILT)') {
									if(data.impuestos[i].importe > 0){
									$('#plz_data1').append('<tr><td>'+data.impuestos[i].codigo+'</td><td>'+data.impuestos[i].cuenta_contable+'</td> <td></td> <td>'+$.number(data.impuestos[i].importe * parseFloat(TipoCambio),2)+'</td> <td></td> </tr>');
								}}
								if (data.impuestos[i].tipo_impuesto == 'Impuesto Retenidos (IR)' || data.impuestos[i].tipo_impuesto == 'Impuesto Local Retenido (ILR)'){
									$('#plz_data1').append('<tr><td>'+data.impuestos[i].codigo+'</td><td>'+data.impuestos[i].cuenta_contable+'</td> <td></td> <td></td> <td>'+$.number(data.impuestos[i].importe * parseFloat(TipoCambio),2)+'</td> </tr>');
								}



								// if (data.xml.impuesto_trasladados > 0){
								// 	$('#plz_data1').append('<tr><td>'+data.impuestos[i].codigo+'</td><td>'+data.impuestos[i].cuenta_contable+'</td> <td></td> <td>'+$.number(data.impuestos[i].importe * parseFloat(TipoCambio),2)+'</td> <td></td> </tr>');						
								// }if (data.xml.impuestos_retenidos > 0){
								// 	$('#plz_data1').append('<tr><td>'+data.impuestos[i].codigo+'</td><td>'+data.impuestos[i].cuenta_contable+'</td> <td></td> <td></td> <td>'+$.number(data.impuestos[i].importe * parseFloat(TipoCambio),2)+'</td> </tr>');						
								// }
							}
						});
					}

					/*AUTOAJUSTE*/
					if(data.xml.ajuste_a_pesos > 0){
						$('#plz_data1').append('<tr><td> '+data.xml.ajuste_cta+' </td><td> '+data.xml.ajuste_cta_nombre+'</td><td></td>'
							+(data.xml.dh_ajuste == 'Haber' ? 
							'<td></td><td>'+$.number(data.xml.ajuste_a_pesos * parseFloat(TipoCambio),2)+' </td></tr>'
							:'<td>'+$.number(data.xml.ajuste_a_pesos * parseFloat(TipoCambio),2)+'</td> <td></td> </tr>'));
					}

					$('#plz_data2').append('<tr><td colspan="4"></td><td><strong>Total Debe</strong></td><td><strong>Total Haber</strong></td></tr>');
					$('#plz_data2').append('<tr><td colspan="4"></td><td>'+accounting.formatMoney(data.xml.total_plz * parseFloat(TipoCambio))+'</td><td>'+accounting.formatMoney(data.xml.total_plz * parseFloat(TipoCambio))+'</td></tr>');
					}
				}
			}
		});
	},

	getParametrizacion :function(){
		if($('#id_empresa_data').val() != 0){
			$('#WdtDropzone').hide();			
			$.ajax({
				url: '/api_cont/parametrizacion/'+$('#id_empresa_data').val(),
				type: 'GET',
				dataType: 'json',
				success: function(data){					
					$('#contImpuestos').append(data.impuestos.length);						
					$('#contIngresos').append(data.ingresos.length);
					$('#contEgresos').append(data.egresos.length);
					if(data.ge.gravados_excentos != '' && data.ge.gravados_excentos != null){
						$('#buttonsCheckEgresos').show();
						$('#buttonsCheckNCF').show();						
					}
					$('#contNCC').append(data.ncc.length);
					$('#contNCF').append(data.ncf.length);
					$('#contNomina').append(data.nomina.length);
					_g.dao.getTablaImpuestos(data.impuestos);
					_g.dao.getTablaIngresos(data.ingresos);
					_g.dao.getTablaEgresos(data.egresos);
					_g.dao.getTablaNCF(data.ncf);
					_g.dao.getTablaNCC(data.ncc);
					_g.dao.getTablaNomina(data.nomina);
					_g.dao.getTablaXMLError();
				}
			}).done(function(){
				$('#cargandoInfo').hide();				
				$('#WdtParametrizacion').show();
			});
		}else{
			_gen.notificacion_min('Error', 'Seleccione una empresa porfavor',4);
		}
	},

	getParametrizacionModificar :function(){
		if($('#id_empresa').val() != 0){
			$.ajax({
				url: '/api_cont/parametrizacion_modificar/'+$('#id_empresa').val(),
				type: 'GET',
				dataType: 'json',
				success: function(data){
					$('#contImpuestos, #contIngresos, #contEgresos, #contNCC, #contNCF, #contNomina').html('');
					$('#contImpuestos').append(data.impuestos.length);						
					$('#contIngresos').append(data.ingresos.length);
					$('#contEgresos').append(data.egresos.length);
					if(data.ge.gravados_excentos != '' && data.ge.gravados_excentos != null){
						$('#buttonsCheckEgresos').show();
						$('#buttonsCheckNCF').show();						
					}
					$('#contNCC').append(data.ncc.length);
					$('#contNCF').append(data.ncf.length);
					$('#contNomina').append(data.nomina.length);
					_g.dao.getTablaImpuestos(data.impuestos);
					_g.dao.getTablaIngresos(data.ingresos);
					_g.dao.getTablaEgresos(data.egresos);
					_g.dao.getTablaNCF(data.ncf);
					_g.dao.getTablaNCC(data.ncc);
					_g.dao.getTablaNomina(data.nomina);
					_g.dao.getTablaXMLError();
				}
			}).done(function (data){
				$('#cargandoInfo').hide();
				$('#WdtParametrizacion').show();
			});
		}else{
			_gen.notificacion_min('Error', 'Seleccione una empresa porfavor',4);
		}
	},

	getTablaImpuestos :function(data){
		var datelist = data;						
		var table = $('#tblImpuestos');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_impuestos"},
		    	          {"aTargets" : [ 1 ], "mData" : "tasa"},
		    	          {"aTargets" : [ 2 ], "mData" : "tipo_impuesto"},
		    	          {"aTargets" : [ 3 ], "mData" : "cuenta_contable"},
		    	          {"aTargets" : [ 4 ], "mData" : "nombre_impuesto"},
		    	          {"aTargets" : [ 5 ], "mData" : "origen"},
		    	          {
							"aTargets": [ 6 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-primary" onclick="_g.dao.getAsignarCuentaImpuestos(' + o.id_impuestos + ')">' + '<i class="glyphicon glyphicon-floppy-saved"></i></a>&nbsp;'
										+'<a class="btn btn-sm btn-success" onclick="_g.dao.getViewImpuestos(' + o.id_impuestos + ')">' + '<i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;';
							}
						  }];
		_gen.setTableNE(table,columnDefs,datelist);		
	},

	getViewImpuestos :function(id){			
		var parametros = {
                "id_empresa" : $('#id_empresa').val(),
                "id" : id,
        };

		$.ajax({
			url: '/api_cont/consulta/impuesto',
			type: 'POST',
			data : parametros,
			dataType: 'json',
			success: function(data){					
				$('#contentParametrizacionModal').html('');
				$('#contentParametrizacionModal').append(
					'<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="inf_xml_uuid"><table class="table table-bordered"><tbody><tr><td><strong>UUID :</strong></td><td id="plz_uuid">'+data.uuid+'</td></tr></tbody></table></div></div><div class="row">'+
						'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="inf_xml_one">'+
							'<table class="table table-bordered">'+													
								'<tbody id="plz_data1">'+
									'<tr><td><strong>Tipo Comprobante : </strong></td><td>'+data.tipo_documento+'</td></tr>'+
									'<tr><td><strong>Total XML : </strong></td><td>'+data.total+'</td></tr>'+
									'<tr><td><strong>SubTotal XML : </strong></td><td>'+data.subTotal+'</td></tr>'+
									'<tr><td><strong>Metodo de pago : </strong></td><td>'+data.metodo_de_pago+'</td></tr>'+
									'<tr><td><strong>Moneda : </strong></td><td>'+data.moneda+'</td></tr>'+
					'</tbody></table></div></div>');
				$('#infoParametrizacionModal').modal();
			}
		});
	},

	getAsignarCuentaImpuestos :function(id){
		if($('#id_cuenta_contable_im').val() != 0 && $('#id_cuenta_contable_imf').val() != 0){
			var parametros = {
	                "id_cuenta" : $('#id_cuenta_contable_im').val(),
	                "id_cuenta_fiscal" : $('#id_cuenta_contable_imf').val(),
	                "id" : id,
	        };

			$.ajax({
				data : parametros,
				url: '/api_cont/asignar_cuenta_impuestos',
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if(localStorage.EditarParametrizacion == true || localStorage.EditarParametrizacion == 'true'){
						_g.dao.getParametrizacionModificar();									
					}if(localStorage.EditarParametrizacion == false || localStorage.EditarParametrizacion == 'false'){
						$.ajax({
							url: '/api_cont/parametrizaciones/impuestos/'+$('#id_empresa_data').val(),
							type: 'GET',
							dataType: 'json',
							success: function(data){							
									
									$('#contImpuestos').html('');													
									$('#contImpuestos').append(data.length);													
									_g.dao.getTablaImpuestos(data);	

							}
						});						
					}
				}
			});

		}else{
			_gen.notificacion_min('Error', 'Seleccione una cuenta contable por favor',4);
		}
	},

	getTablaIngresos :function(data){
		var table = $('#tblIngresos');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_datatable"},
		    	          {"aTargets" : [ 1 ], "mData" : "descripcion"},
		    	          {"aTargets" : [ 2 ], "mData" : "cliente"},
		    	          {"aTargets" : [ 3 ], "mData" : "importe"},
		    	          {"aTargets" : [ 4 ], "mData" : "cuenta_contable"},			    	          
		    	          {
							"aTargets": [ 5 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-primary" onclick="_g.dao.getAsignarCuenta(' + o.id_datatable + ',2,0)">' + '<i class="glyphicon glyphicon-floppy-saved"></i></a>&nbsp;'
										+'<a class="btn btn-sm btn-success" onclick="_g.dao.getViewModal(' + o.id_datatable + ',2)">' + '<i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;'
										+'<a class="btn btn-sm btn-warning" onclick="_g.dao.getAsignarDispercion(' + o.id_datatable + ',2,0)">' + '<i class="glyphicon glyphicon-refresh"></i></a>&nbsp;';
							}
						  }];

		//_gen.setTableNE(table,columnDefs,datelist);
		_gen.setDataTable(table,columnDefs,data);
	},	

	getTablaEgresos :function(data){
		var table = $('#tblEgresos');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_datatable"},
		    	          {"aTargets" : [ 1 ], "mData" : "descripcion"},
		    	          {"aTargets" : [ 2 ], "mData" : "proveedor"},
		    	          {"aTargets" : [ 3 ], "mData" : "importe"},
		    	          {
							"aTargets": [ 4 ],
							"mData": null,
							"mRender": function (o) { 
								if(o.tasa_iva == 'IVA 16'){
									return '<span class="center-block padding-5 label label-success">'+o.tasa_iva+'</span>';
								}
								if(o.tasa_iva == 'IVA 0'){
									return '<span class="center-block padding-5 label label-primary">'+o.tasa_iva+'</span>'; 									
								}
								if(o.tasa_iva == 'Excento'){
									return '<span class="center-block padding-5 label label-warning">'+o.tasa_iva+'</span>'; 									
								}
								if(o.tasa_iva == 'NA'){
									return '<span class="center-block padding-5 label label-danger">'+o.tasa_iva+'</span>'; 									
								}
							}
						  },
		    	          {
							"aTargets": [ 5 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-default" onclick="_g.dao.getTasa(' + o.id_datatable + ', 1)">' + '<i class="glyphicon glyphicon-refresh"></i></a>&nbsp;'
									   +'<a class="btn btn-sm btn-primary" onclick="_g.dao.getAsignarCuenta(' + o.id_datatable + ',3,0)">' + '<i class="glyphicon glyphicon-floppy-saved"></i></a>&nbsp;'
									   +'<a class="btn btn-sm btn-success" onclick="_g.dao.getViewModal(' + o.id_datatable + ',3)">' + '<i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;'
									   +'<a class="btn btn-sm btn-warning" onclick="_g.dao.getAsignarDispercion(' + o.id_datatable + ',3,0)">' + '<i class="glyphicon glyphicon-refresh"></i></a>&nbsp;';
							}
						  }];

		//_gen.setTableNE(table,columnDefs,datelist);
		_gen.setDataTable(table,columnDefs,data);		
	},

	getTasa :function(id,tipo){
		var parametros = {};
		var url_data = '';
		if(tipo == 1){
			parametros = {'id_concepto' : id, 'tasa_iva' : $('#tasa_iva').val()};
			url_data = '/api_cont/parametrizaciones/egresos/'+$('#id_empresa_data').val();
		}if(tipo == 2){
			parametros = {'id_concepto' : id, 'tasa_iva' : $('#tasa_iva_ncf').val()};
			url_data = '/api_cont/parametrizaciones/ncf/'+$('#id_empresa_data').val();
		}
		$.ajax({
			url: '/api_cont/concepto_nueva_tasa',
			data: parametros,
			type: 'POST',
			dataType: 'json',
			success: function(data){
				_gen.notificacion_min('Exito', 'Se guardo correctamente',1);
			}
		}).done(function(data){			
			$.ajax({
				url: url_data,
				type: 'GET',
				dataType: 'json',
				success: function(data){
					if(tipo == 1){
						_g.dao.getTablaEgresos(data);						
					}if(tipo == 2){
						_g.dao.getTablaNCF(data);
					}
				}
			});
		});
	},

	getTablaNCC :function(data){
		var table = $('#tblNCC');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_datatable"},
		    	          {"aTargets" : [ 1 ], "mData" : "descripcion"},
		    	          {"aTargets" : [ 2 ], "mData" : "cliente"},
		    	          {"aTargets" : [ 3 ], "mData" : "importe"},
		    	          {"aTargets" : [ 4 ], "mData" : "cuenta_contable"},
		    	          {
							"aTargets": [ 5 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-primary" onclick="_g.dao.getAsignarCuenta(' + o.id_datatable + ',4,0)">' + '<i class="glyphicon glyphicon-floppy-saved"></i></a>&nbsp;'
										+'<a class="btn btn-sm btn-success" onclick="_g.dao.getViewModal(' + o.id_datatable + ',4)">' + '<i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;';  
							}
						  }];

		//_gen.setTableNE(table,columnDefs,datelist);
		_gen.setDataTable(table,columnDefs,data);
	},

	getTablaNCF :function(data){
		var table = $('#tblNCF');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_datatable"},
		    	          {"aTargets" : [ 1 ], "mData" : "descripcion"},
		    	          {"aTargets" : [ 2 ], "mData" : "proveedor"},
		    	          {"aTargets" : [ 3 ], "mData" : "importe"},
		    	          {
							"aTargets": [ 4 ],
							"mData": null,
							"mRender": function (o) { 
								if(o.tasa_iva == 'IVA 16'){
									return '<span class="center-block padding-5 label label-success">'+o.tasa_iva+'</span>';
								}
								if(o.tasa_iva == 'IVA 0'){
									return '<span class="center-block padding-5 label label-primary">'+o.tasa_iva+'</span>'; 									
								}
								if(o.tasa_iva == 'Excento'){
									return '<span class="center-block padding-5 label label-warning">'+o.tasa_iva+'</span>'; 									
								}
								if(o.tasa_iva == 'NA'){
									return '<span class="center-block padding-5 label label-danger">'+o.tasa_iva+'</span>'; 									
								}
							}
						  },
		    	          {
							"aTargets": [ 5 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-default" onclick="_g.dao.getTasa(' + o.id_datatable + ', 2)">' + '<i class="glyphicon glyphicon-refresh"></i></a>&nbsp;'
										+'<a class="btn btn-sm btn-primary" onclick="_g.dao.getAsignarCuenta(' + o.id_datatable + ',5,0)">' + '<i class="glyphicon glyphicon-floppy-saved"></i></a>&nbsp;'
										+'<a class="btn btn-sm btn-success" onclick="_g.dao.getViewModal(' + o.id_datatable + ',5)">' + '<i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;'; 
							}
						  }];

		//_gen.setTableNE(table,columnDefs,datelist);
		_gen.setDataTable(table,columnDefs,data);
	},

	getTablaNomina :function(data){
		var table = $('#tblNomina');
		$.each(data, function(i) {
			data[i].departamento_numero = '<h6><span class="label label-success">'+data[i].departamento_numero+'</span></h6>';
		});
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_nomina_pd"},
		    	          {"aTargets" : [ 1 ], "mData" : "concepto"},
		    	          {"aTargets" : [ 2 ], "mData" : "departamento_numero"},
		    	          {"aTargets" : [ 3 ], "mData" : "tipo"},
		    	          {"aTargets" : [ 4 ], "mData" : "tipo_clave"},
		    	          {"aTargets" : [ 5 ], "mData" : "cuenta_contable"},
		    	          {
							"aTargets": [ 6 ],
							"mData": null,
							"mRender": function (o) { 
								if(o.tipo == "Deduccion"){
									var tipo_nomina = 1;
								}if(o.tipo == "Percepcion"){
									var tipo_nomina = 2;
								}var tipo_clave = o.tipo_clave;
								return '<a class="btn btn-sm btn-primary" onclick="_g.dao.getAsignarCuentaNomina(' + o.id_nomina_pd + ',\''+tipo_clave+'\','+tipo_nomina+')">' + '<i class="glyphicon glyphicon-floppy-saved"></i></a>&nbsp;';
									  //+'<a class="btn btn-sm btn-warning" onclick="_g.dao.getAsignarDispercion(' + o.id_datatable + ',3,0)">' + '<i class="glyphicon glyphicon-refresh"></i></a>&nbsp;';
							}
						  }];

		_gen.setTableNE(table,columnDefs,data);
	},


	getConceptosCuentas :function(data){
		var table = $('#tbAsignados');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "cuenta"},
		    	          {"aTargets" : [ 1 ], "mData" : "monto"},
		    	          {
							"aTargets": [ 2 ],
							"mData": null,
							"mRender": function (o) { 
								if(o.monto != 0){
									return '<a class="btn btn-sm btn-success" onclick="_g.dao.getCancelarDispercion(' + o.id + ',' + o.id_xml_concepto + ')">' + '<i class="glyphicon glyphicon-list-alt"></i></a>&nbsp;';									
								}else{
									return '';
								}
							}
						  }];
		_gen.setTableNE(table,columnDefs,data);
		$('#tbAsignados').show('slow');
	},

	getDispercionClientes :function(data){
		var table = $('#tblDispercionClientes');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "descripcion"},
		    	          {"aTargets" : [ 1 ], "mData" : "cliente"},
		    	          {"aTargets" : [ 2 ], "mData" : "importe"},
		    	          {"aTargets" : [ 3 ], "mData" : "anticipo_concepto"},
		    	          {"aTargets" : [ 4 ], "mData" : "saldo_concepto"},		    	          
		    	          {
							"aTargets": [ 5 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-success" id="btnIngresos-'+o.id_datatable+'" onclick="_g.dao.getOperacionesIngresos(' + o.id_datatable + ','+o.importe+','+o.saldo_concepto+')">' + '<i class="glyphicon glyphicon-list-alt"></i></a>&nbsp;';
							}
						  }];

		_gen.setTableNE(table,columnDefs,data);
	},

	getDispercionProveedores :function(data){
		var table = $('#tblDispercionProveedores');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "descripcion"},
		    	          {"aTargets" : [ 1 ], "mData" : "proveedor"},
		    	          {"aTargets" : [ 2 ], "mData" : "importe"},
		    	          {"aTargets" : [ 3 ], "mData" : "anticipo_concepto"},
		    	          {"aTargets" : [ 4 ], "mData" : "saldo_concepto"},		    	          
		    	          {
							"aTargets": [ 5 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-success" id="btnEgresos-'+o.id_datatable+'" onclick="_g.dao.getOperacionesEgresos(' + o.id_datatable + ','+o.importe+','+o.saldo_concepto+')">' + '<i class="glyphicon glyphicon-list-alt"></i></a>&nbsp;';
							}
						  }];

		_gen.setTableNE(table,columnDefs,data);
	},

	getDispercionNomina :function(data){
		var table = $('#tblDispercionNomina');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "empleado"},
		    	          {"aTargets" : [ 1 ], "mData" : "Departamento"},
		    	          {
							"aTargets": [ 2 ],
							"mData": null,
							"mRender": function (o) { 
								return '<a class="btn btn-sm btn-success" id="btnNominaDispercion-'+o.id_nomina+'" onclick="_g.dao.getCambioDepartamento(' + o.id_nomina +')">' + '<i class="glyphicon glyphicon-list-alt"></i></a>&nbsp;';
							}
						  }];

		_gen.setTableNE(table,columnDefs,data);
	},

	getDispercionNominaTotales :function(data){
		var table = $('#tbDepartamentosNomina');
		var columnDefs = [{"aTargets" : [ 0 ], "mData" : "Departamento"},
		    	          {"aTargets" : [ 1 ], "mData" : "numero"}];
		_gen.setTableNE(table,columnDefs,data);
	},

	getAsignarCuentaNomina :function( id, tipo_clave, tipo_nomina){
		if(tipo_clave == '017' && tipo_nomina == '2'){
			if($('#id_cuenta_contable_nomina').val() != 0 && $('#id_cuenta_contable_nomina_excepcion').val() != 0){
				var parametros = {
		                "id_cuenta" : $('#id_cuenta_contable_nomina').val(),
		                "id_cuenta_excepcion" : $('#id_cuenta_contable_nomina_excepcion').val(),
		                "id" : id,
		        };
		        $.ajax({
					data : parametros,
					url: '/api_cont/asignar_cuenta_nomina',
					type: 'POST',
					dataType: 'json',
					success: function(data){	
						if(localStorage.EditarParametrizacion == true || localStorage.EditarParametrizacion == 'true'){
							_g.dao.getParametrizacionModificar();									
						}if(localStorage.EditarParametrizacion == false || localStorage.EditarParametrizacion == 'false'){				
							$.ajax({
								url: '/api_cont/parametrizaciones/nomina/'+$('#id_empresa_data').val(),
								type: 'GET',
								dataType: 'json',
								success: function(data){							
										$('#contNomina').html('');													
										$('#contNomina').append(data.length);													
										_g.dao.getTablaNomina(data);							
								}
							});
						}
					}
				});
		    }else{
				_gen.notificacion_min('Error', 'Seleccione una cuenta contable y una adicional por favor',4);		    	
		    }	
		}else if(tipo_clave == '002' && tipo_nomina == '1'){
			if($('#id_cuenta_contable_nomina').val() != 0 && $('#id_cuenta_contable_nomina_excepcion').val() != 0){
				var parametros = {
		                "id_cuenta" : $('#id_cuenta_contable_nomina').val(),
		                "id_cuenta_excepcion" : $('#id_cuenta_contable_nomina_excepcion').val(),
		                "id" : id,
		        };
		        $.ajax({
					data : parametros,
					url: '/api_cont/asignar_cuenta_nomina',
					type: 'POST',
					dataType: 'json',
					success: function(data){	
						if(localStorage.EditarParametrizacion == true || localStorage.EditarParametrizacion == 'true'){
							_g.dao.getParametrizacionModificar();									
						}if(localStorage.EditarParametrizacion == false || localStorage.EditarParametrizacion == 'false'){			
							$.ajax({
								url: '/api_cont/parametrizaciones/nomina/'+$('#id_empresa_data').val(),
								type: 'GET',
								dataType: 'json',
								success: function(data){							
										$('#contNomina').html('');													
										$('#contNomina').append(data.length);													
										_g.dao.getTablaNomina(data);							
								}
							});
						}
					}
				});
		    }else{
				_gen.notificacion_min('Error', 'Seleccione una cuenta contable y una adicional por favor',4);		    	
		    }
		}else{
			if($('#id_cuenta_contable_nomina').val() != 0){
				var parametros = {
		                "id_cuenta" : $('#id_cuenta_contable_nomina').val(),
		                "id_cuenta_excepcion" : '0',
		                "id" : id,
		        };			
				$.ajax({
					data : parametros,
					url: '/api_cont/asignar_cuenta_nomina',
					type: 'POST',
					dataType: 'json',
					success: function(data){
						if(localStorage.EditarParametrizacion == true || localStorage.EditarParametrizacion == 'true'){
							_g.dao.getParametrizacionModificar();									
						}if(localStorage.EditarParametrizacion == false || localStorage.EditarParametrizacion == 'false'){
							$.ajax({
								url: '/api_cont/parametrizaciones/nomina/'+$('#id_empresa_data').val(),
								type: 'GET',
								dataType: 'json',
								success: function(data){							
										$('#contNomina').html('');													
										$('#contNomina').append(data.length);													
										_g.dao.getTablaNomina(data);							
								}
							});
						}
					}
				});

			}else{
				_gen.notificacion_min('Error', 'Seleccione una cuenta contable por favor',4);
			}
		}
	},

	/** FUNCION PARA LA ASIGNACION DE CUENTAS EN DISPERCION **/
	getAsignarDispercion :function(id, type, multi){
		if(multi == 0){
			url_route = '/api_cont/asignar_dispercion';			
		}if(multi == 1){
			url_route = '/api_cont/asignar_dispercion_multiple';	
		}
		if(type == 2){
			var parametros = {
	                "id" : id,
	        };
	        url_table = '/api_cont/parametrizaciones/ingresos/';	
		}
		if(type == 3){
			var parametros = {
	                "id" : id,
	                "no_deducible" : $('#no_deducible').val(),
	                "IVAAcreIdent" : $('#IVAAcreIdentE').val(),
	                "IvaAcreNOIdent" : $('#IvaAcreNOIdentE').val(),
	                "IVAAcreExento" : $('#IVAAcreExentoE').val(),
	        };
	        url_table = '/api_cont/parametrizaciones/egresos/';
		}

		$.ajax({
			data : parametros,
			url: url_route,
			type: 'POST',
			dataType: 'json',
		}).done( function (data){
			if(localStorage.EditarParametrizacion == true || localStorage.EditarParametrizacion == 'true'){
				_g.dao.getParametrizacionModificar();									
			}if(localStorage.EditarParametrizacion == false || localStorage.EditarParametrizacion == 'false'){
				$.ajax({
					url: url_table + $('#id_empresa_data').val(),
					type: 'GET',
					dataType: 'json',
				}).done( function (data){

					$('.success').removeClass('success');	
					selectedRows = [];
					if(type == 2){
						$('#contIngresos').html('');													
						$('#contIngresos').append(data.length);													
						_g.dao.getTablaIngresos(data);						
					}if(type == 3){
						$('#contEgresos').html('');													
						$('#contEgresos').append(data.length);													
						_g.dao.getTablaEgresos(data);
					}if(type == 4){
						$('#contNCC').html('');													
						$('#contNCC').append(data.length);													
						_g.dao.getTablaNCC(data);
					}if(type == 5){
						$('#contNCF').html('');													
						$('#contNCF').append(data.length);													
						_g.dao.getTablaNCF(data);
					}

				});
			}
		});
	},

	getAsignarDispercionNomina :function(id){
		if(id != 0){
			var parametros = {
	                "id" : id,
	        };

			$.ajax({
				data : parametros,
				url: '/api_cont/asignar_dispercion_nomina',
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if(localStorage.EditarParametrizacion == true || localStorage.EditarParametrizacion == 'true'){
						_g.dao.getParametrizacionModificar();									
					}if(localStorage.EditarParametrizacion == false || localStorage.EditarParametrizacion == 'false'){					
						$.ajax({
							url: '/api_cont/parametrizaciones/nomina/'+$('#id_empresa_data').val(),
							type: 'GET',
							dataType: 'json',
							success: function(data){							
									$('#contNomina').html('');													
									$('#contNomina').append(data.length);													
									_g.dao.getTablaNomina(data);							
							}
						});
					}
				}
			});

		}else{
			_gen.notificacion_min('Error', 'Seleccione un registro',4);
		}
	},

	getCambioDepartamento :function(id){
		if(id != 0 && $('#id_departamento_nomina').val() != 0){
			var parametros = {
	                "id" : id,
	                "Departamento" : $('#id_departamento_nomina').val()
	        };

			$.ajax({
				data : parametros,
				url: '/api_cont/actualizar_departamento',
				type: 'POST',
				dataType: 'json',
				success: function(data){					
					_g.dao.getTablaDispercionNominaTotales();
					_g.dao.getTablaDispercionNomina();
					_g.listas.getDepartamentoNomina();
				}
			});

		}else{
			_gen.notificacion_min('Error', 'Seleccione un departamento',4);
		}
	},
	/** END **/

	/** FUNCION PARA LA ASIGNACION DE CUENTAS EN PARAMETRIZACION **/
	getAsignarCuenta :function(id, type, multi){

		if(multi == 0){
			url_route = '/api_cont/asignar_cuenta';			
		}if(multi == 1){
			url_route = '/api_cont/asignar_cuenta_multiple';	
		}

		if(type == 2){
			ElementCC = $('#id_cuenta_contable_i');
			url_table = '/api_cont/parametrizaciones/ingresos/';
		}if(type == 3){
			ElementCC = $('#id_cuenta_contable_e');
			url_table = '/api_cont/parametrizaciones/egresos/';			
			var parametros = {
	                "id_cuenta" : ElementCC.val(),
	                "id" : id,
	                "no_deducible" : $('#no_deducible').val(),
	                "IVAAcreIdent" : $('#IVAAcreIdentE').val(),
	                "IvaAcreNOIdent" : $('#IvaAcreNOIdentE').val(),
	                "IVAAcreExento" : $('#IVAAcreExentoE').val(),
	        };
		}if(type == 4){
			ElementCC = $('#id_cuenta_contable_ncc');
			url_table = '/api_cont/parametrizaciones/ncc/';	
		}if(type == 5){
			ElementCC = $('#id_cuenta_contable_ncf');
			url_table = '/api_cont/parametrizaciones/ncf/';	
			var parametros = {
	                "id_cuenta" : ElementCC.val(),
	                "id" : id,
	                "IVAAcreIdent" : $('#IVAAcreIdentNCF').val(),
	                "IvaAcreNOIdent" : $('#IvaAcreNOIdentNCF').val(),
	                "IVAAcreExento" : $('#IVAAcreExentoNCF').val(),
	                "id_empresa" : $('#id_empresa_data').val(),
	        };
		}
		if(ElementCC.val() != 0){
			if(type == 2 || type == 4){
				var parametros = {
		                "id_cuenta" : ElementCC.val(),
		                "id" : id,
	                	"id_empresa" : $('#id_empresa_data').val(),
		        };				
			}
			$.ajax({
				data : parametros,
				url: url_route,
				type: 'POST',
				dataType: 'json',
			}).done( function (data){
				if(localStorage.EditarParametrizacion == true || localStorage.EditarParametrizacion == 'true'){
					_g.dao.getParametrizacionModificar();									
				}if(localStorage.EditarParametrizacion == false || localStorage.EditarParametrizacion == 'false'){				
					$.ajax({
						url: url_table + $('#id_empresa_data').val(),
						type: 'GET',
						dataType: 'json',
					}).done( function (data){
						$('.success').removeClass('success');	
						selectedRows = [];
						if(type == 2){
							$('#contIngresos').html('');													
							$('#contIngresos').append(data.length);													
							_g.dao.getTablaIngresos(data);						
						}if(type == 3){
							$('#contEgresos').html('');													
							$('#contEgresos').append(data.length);													
							_g.dao.getTablaEgresos(data);
						}if(type == 4){
							$('#contNCC').html('');													
							$('#contNCC').append(data.length);													
							_g.dao.getTablaNCC(data);
						}if(type == 5){
							$('#contNCF').html('');													
							$('#contNCF').append(data.length);													
							_g.dao.getTablaNCF(data);
						}
					});
				}
			});				
		}else{
			_gen.notificacion_min('Error', 'Seleccione una cuenta contable por favor',4);
		}
	},
	/** END **/

	/** FUNCION DE MODAL **/
	getViewModal :function(id, type){
		if (type == 2){
			ruta = '/api_cont/consulta/ingresos';
		}if (type == 3){
			ruta = '/api_cont/consulta/egresos';
		}if (type == 4){
			ruta = '/api_cont/consulta/ncc';
		}if (type == 5){
			ruta = '/api_cont/consulta/ncf';
		}			
		var parametros = {
                "id_empresa" : $('#id_empresa').val(),
                "id" : id,
        };

		$.ajax({
			url: ruta,
			type: 'POST',
			data : parametros,
			dataType: 'json',
		}).done(function( data){			
			$('#contentParametrizacionModal').html('');
			$('#contentParametrizacionModal').append(	
				'<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="inf_xml_uuid"><table class="table table-bordered"><tbody><tr><td><strong>UUID :</strong></td><td id="plz_uuid">'+data.uuid+'</td></tr></tbody></table></div></div><div class="row">'+
					'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="inf_xml_one">'+
						'<table class="table table-bordered">'+													
							'<tbody id="plz_data1">'+
								'<tr><td><strong>Tipo Comprobante : </strong></td><td>'+data.origen+'</td></tr>'+
								'<tr><td><strong>Total XML : </strong></td><td>'+data.total+'</td></tr>'+
								'<tr><td><strong>SubTotal XML : </strong></td><td>'+data.subTotal+'</td></tr>'+
								'<tr><td><strong>Metodo de pago : </strong></td><td>'+data.metodo_de_pago+'</td></tr>'+
								'<tr><td><strong>Moneda : </strong></td><td>'+data.moneda+'</td></tr>'+
					'</tbody></table></div></div>');
			$('#infoParametrizacionModal').modal();
		});
	},
	/** END **/

	/** FUNCION PARA CREAR TABLA CON ERRORES EN LA PARAMETRIZACION **/
	getTablaXMLError :function(){
		$.ajax({
			url: '/api_cont/archivos_xml_error/'+$('#id_empresa_data').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function (data){
			var datelist = data;var table = $('#tblError');
			$('#contError').append(data.length);			
			var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id"},
			    	          {"aTargets" : [ 1 ], "mData" : "nombre_archivo"},
			    	          {"aTargets" : [ 2 ], "mData" : "uuid"},
			    	          {"aTargets" : [ 3 ], "mData" : "observaciones"}];
			_gen.setTableNE(table,columnDefs,datelist);					
		});
	},
	/** END **/

	getTablaDispercionClientes :function(){
		$.ajax({
			url: '/api_cont/dispercion/ingresos/'+$('#id_empresa').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			_g.dao.getDispercionClientes(data);			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente','gritter-error');
		});
	},

	getTablaDispercionProveedores :function(){
		$.ajax({
			url: '/api_cont/dispercion/egresos/'+$('#id_empresa').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			_g.dao.getDispercionProveedores(data);			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente','gritter-error');
		});
	},

	getTablaDispercionNomina :function(){
		$.ajax({
			url: '/api_cont/dispercion/nomina/'+$('#id_empresa').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			_g.dao.getDispercionNomina(data);			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente','gritter-error');
		});
	},

	getTablaDispercionNominaTotales :function(){
		$.ajax({
			url: '/api_cont/dispercion/nomina_totales/'+$('#id_empresa').val(),
			type: 'GET',
			dataType: 'json',
		}).done(function(data){
			_g.dao.getDispercionNominaTotales(data);			
		}).fail(function(data) {
		    _gen.notificacion_min('Error', 'La operaci&oacute;n no se realiz&oacute; correctamente','gritter-error');
		});
	},

	getOperacionesIngresos : function(id, importe, saldo){
		_g.listas.getCatCuentasConceptosId(id,$('#id_cuentas_conceptos_clientes'));			
		localStorage.id_dispercion_ingresos = id;
		$("#id_concepto_clientes").val(id);			
		localStorage.cantidad_oclientes = saldo;
		$('#operaciones_conceptos_clientes').show('slow');
		$('#operaciones_clientes').val(saldo).focus();
	},

	getOperacionesEgresos : function(id, importe, saldo){
		_g.listas.getCatCuentasConceptosId(id,$('#id_cuentas_conceptos_proveedores'));			
		localStorage.id_dispercion_egresos = id;
		$("#id_concepto_proveedores").val(id);			
		localStorage.cantidad_oproveedores = saldo;
		$('#operaciones_conceptos_proveedores').show('slow');
		$('#operaciones_proveedores').val(saldo).focus();
	},

	getCancelarDispercion :function(id, id_xml_concepto, tipo){
		$.ajax({
			url: '/api_cont/cancelar_dispercion_conceptos/'+id+'/'+id_xml_concepto,
			type: 'GET',
			dataType: 'json',
		}).done( function (data){
			_g.dao.getConceptosCuentas(data);
			_g.dao.getTablaDispercionClientes();
			_g.dao.getTablaDispercionProveedores();			
			if($('#id_concepto_clientes').val() != ''){
				_g.listas.getCatCuentasConceptosId($('#id_concepto_clientes').val(),$('#id_cuentas_conceptos_clientes'));				
			}if($('#id_concepto_proveedores').val() != ''){
				_g.listas.getCatCuentasConceptosId($('#id_concepto_proveedores').val(),$('#id_cuentas_conceptos_proveedores'));				
			}
			_gen.notificacion_min('Exito', 'Se guardo correctamente',1);
		});
	},

	getOperacionesClientes :function(){
		if(parseFloat($("#operaciones_clientes").val()) > localStorage.cantidad_oclientes){
			_gen.notificacion_min('Error','La cantidad es mayor',4);
		}else{
			if($('#id_cuentas_conceptos_clientes').val() != 0 || $('#id_cuentas_conceptos_clientes').val() != ''){
			    var id_cuentas_conceptos_clientes = $('#id_cuentas_conceptos_clientes').val();
				$('#id_cuentas_conceptos_clientes').val(0);
				if($('#id_concepto_clientes').val() != '' && $('#operaciones_clientes').val() != ''){

			        var info_conceptos = { id_cuenta : id_cuentas_conceptos_clientes, monto: $('#operaciones_clientes').val() };
			        $.ajax({
						data : info_conceptos,
						url: '/api_cont/dispercion_conceptos/'+$('#id_concepto_clientes').val(),
						type: 'PUT',
						dataType: 'json',
					}).done( function (data){
						_g.dao.getConceptosCuentas(data);
						_g.listas.getCatCuentasConceptosId($('#id_concepto_clientes').val(),$('#id_cuentas_conceptos_clientes'));	
						_g.dao.getTablaDispercionClientes();
						_gen.notificacion_min('Exito', 'Se guardo correctamente',1);
					});

			        localStorage.cantidad_oclientes = parseFloat(localStorage.cantidad_oclientes)-parseFloat($('#operaciones_clientes').val());
			        $("#operaciones_clientes").val(localStorage.cantidad_oclientes);					
				}
			    if($("#operaciones_clientes").val() <= 0){
			    	_g.listas.getConceptosDispercion($('#id_empresa').val(),$('#id_concepto_dispercion'));
					$("#operaciones_conceptos_clientes").hide();
			    	$("#operaciones_clientes").val('0');
			    	localStorage.id_dispercion_ingresos = 0;
			    	localStorage.cantidad_oclientes = 0;
			    }
			}else{
				_gen.notificacion_min('Error', 'Seleccione una cuenta del concepto',4);
			}
		}
	},

	getOperacionesProveedores :function(){
		if(parseFloat($("#operaciones_proveedores").val()) > localStorage.cantidad_oproveedores){
			_gen.notificacion_min('Error','La cantidad es mayor',4);
		}else{
			if($('#id_cuentas_conceptos_proveedores').val() != 0 || $('#id_cuentas_conceptos_proveedores').val() != ''){
			    var id_cuentas_conceptos_proveedores = $('#id_cuentas_conceptos_proveedores').val();
				$('#id_cuentas_conceptos_proveedores').val(0);
				if($('#id_concepto_proveedores').val() != '' && $('#operaciones_proveedores').val() != ''){

			        var info_conceptos = { id_cuenta : id_cuentas_conceptos_proveedores, monto: $('#operaciones_proveedores').val() };
			        $.ajax({
						data : info_conceptos,
						url: '/api_cont/dispercion_conceptos/'+$('#id_concepto_proveedores').val(),
						type: 'PUT',
						dataType: 'json',
					}).done( function (data){
						_g.dao.getConceptosCuentas(data);
						_g.listas.getCatCuentasConceptosId($('#id_concepto_proveedores').val(),$('#id_cuentas_conceptos_proveedores'));	
						_g.dao.getTablaDispercionProveedores();
						_gen.notificacion_min('Exito', 'Se guardo correctamente',1);
					});

			        localStorage.cantidad_oproveedores = parseFloat(localStorage.cantidad_oproveedores)-parseFloat($('#operaciones_proveedores').val());
			        $("#operaciones_proveedores").val(localStorage.cantidad_oproveedores);					
				}
			    if($("#operaciones_proveedores").val() <= 0){
			    	_g.listas.getConceptosDispercionE($('#id_empresa').val(),$('#id_concepto_dispercion'));
					$("#operaciones_conceptos_proveedores").hide();
			    	$("#operaciones_proveedores").val('0');
			    	localStorage.id_dispercion_ingresos = 0;
			    	localStorage.cantidad_oproveedores = 0;
			    }
			}else{
				_gen.notificacion_min('Error', 'Seleccione una cuenta del concepto',4);
			}
		}
	},
};