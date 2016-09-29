$(document).ready(function(){
	localStorage.removeItem('id_empresa');
	$(".datepickerEs").datepicker({ 
		dateFormat: 'yy-mm-dd',
		language: "es" 
	});
});
var pagefunction = function() {
	_g.listas.getEmpresas();
	$("#btnNuevo").click(function(){			
	    if($('#id_empresa').val() != 0){
	        window.location.href='/#contabilidad/poliza_manual/nuevo';
	    }else{
        	_gen.notificacion_min('Error','Es necesario seleccionar una empresa',4);
	    }
	});
	$("#btnConsultar").click(function(){
	    if($('#id_empresa').val() != 0){
	       _g.dao.getPolizasBancos();
	    }else{
        	_gen.notificacion_min('Error','Es necesario seleccionar una empresa',4);
	    }
	});
	$("#id_empresa").change(function(event) {
		_g.dao.getPolizasBancos();		
		_g.listas.getEmpresasSucursales();
		localStorage.id_empresa = $("#id_empresa").val();
	});
};

_g.dao = {
	getPolizasBancos :function(){
		var parametros = {
                "id_empresa" : $('#id_empresa').val(),
                "id_sucursal" : $('#id_sucursal').val(),
                "fecha_poliza" : $('#fecha_poliza').val(),
                "tipo_poliza" : $('#tipo_poliza').val(),
                "num_operacion" : $('#num_operacion').val(),
                "tipo_operacion" : $('#tipo_operacion').val(),
                "concepto_poliza" : $('#concepto_poliza').val(),
                "folio" : $('#folio').val(),
                "fecha_desde" : $('#fecha_desde').val(),
                "fecha_hasta" : $('#fecha_hasta').val(),
        };
		$.ajax({
			data : parametros,
			url: '/api_cont/polizas_manuales_avanzada',
			type: 'POST',
			dataType: 'json',
			success: function(data){
				var datelist = [];
				console.log(data);
				if(data.length != 0){				
					$.each(data, function(i) {
						if(data[i].movimientos_bancarios == 0 || data[i].movimientos_bancarios == null){
						 	data[i].movimientos_bancarios = '<a href="javascript:void(0);" readonly="true" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></a>';
						}if(data[i].movimientos_bancarios == 'on'){
						 	data[i].movimientos_bancarios = '<a href="javascript:void(0);" readonly="true" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>';
						}
					});	
					datelist = data;				
				}
				var table = $('#tblPolizasManuales');				
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "tipo_poliza"},
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "poliza"},
				    	          {"aTargets" : [ 3 ], "mData" : "concepto"},
				    	          {"aTargets" : [ 4 ], "mData" : "tipo_documento"},
				    	          {"aTargets" : [ 5 ], "mData" : "num_documento"},
				    	          {"aTargets" : [ 6 ], "mData" : "movimientos_bancarios"},
				    	          {
									"aTargets": [ 7 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" target="_blank" onclick="_g.dao.getModalPDF(' + o.id + ')"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;'; 
									}
								  }];
				_gen.setTableNE(table,columnDefs,datelist);
				$('#infoBancosEmpresas').show('slow');
			}
		});
	},

	getModalPDF: function(id){
		var url = '/api_cont/reporte_poliza_manual/'+id;
		$('#PDFPreview').attr('src',url);
		$('#infoPreviewPDF').modal('show');
	}
}
pagefunction();