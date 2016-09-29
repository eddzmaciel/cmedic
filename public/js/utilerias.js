var _g = { func : {},dao : {},dao_g : {},datelist : {},tblDatatable : {},currentDates : {},listas : {}, selected_xml:{}};
var selectedRows = [];
var xmls_poliza = [];
var _gen = {
	notificacion : function(titulo, content, style){
		if(style==1){var _c="#739E73", _i="fa fa-check",_n="";}
		if(style==2){var _c="#3276B1", _i="fa fa-bell swing animated",_n="";}
		if(style==3){var _c="#C79121", _i="fa fa-shield fadeInLeft animated",_n="";}
		if(style==4){var _c="#C46A69", _i="fa fa-warning shake animated",_n="";}
		$.bigBox({
			title : titulo,
			content : content,
			color : _c,
			timeout: 8000,
			icon : _i,
			number : _n
		});
	},
	notificacion_min : function(titulo, content, style){
		if(style==1){var _c="#739E73", _i="fa fa-check",_n="";}
		if(style==2){var _c="#3276B1", _i="fa fa-bell swing animated",_n="";}
		if(style==3){var _c="#C79121", _i="fa fa-shield fadeInLeft animated",_n="";}
		if(style==4){var _c="#C46A69", _i="fa fa-warning shake animated",_n="";}
		$.smallBox({
			title : titulo,
			content : content,
			color : _c,
			iconSmall : _i + "bounce animated",
			timeout : 6000
		});
	},
	setTable : function(tabla, columnDefs, datelist){
		var responsiveHelper_datatable_tabletools = undefined;
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};
		var tblDatatable = {};
		if($.fn.DataTable.fnIsDataTable(tabla)){
			_gen.selectRowsTable(tabla);
			tabla.dataTable().fnClearTable();
			tabla.dataTable().fnAddData(datelist);
		}else{
			tblDatatable = tabla.dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"oTableTools": {
					 "aButtons": [				     
				     // "csv",
				     "xls",
				        {
				            "sExtends": "pdf",
				            "sTitle": "Informacion",
				            "sPdfMessage": "Informacion PDF Export",
				            "sPdfSize": "letter"
				        }
				     ],
				    "sSwfPath": "assets/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
				},
				"language": {
		            "info": "Página _PAGE_ de _PAGES_",
		            "sEmptyTable": "No se encontraron registros!",
		        },
				"autoWidth" : true,
				'aaData' : datelist,
				"aoColumnDefs" : columnDefs,
				"preDrawCallback" : function() {
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper(tabla, breakpointDefinition);
						$('.jarviswidget-toggle-btn').click();
						_gen.selectRowsTable(tabla);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			_gen.selectRowsTable(tabla);
		}
	},
	selectRowsTable: function(tabla){		
		$(tabla.selector+" tbody").click(function(e) {
			if($(e.target.parentNode).hasClass('success')){
				_g.currentDates = {};
				$(e.target.parentNode).removeClass('success');
			}else{
				var row = tabla.fnGetData(e.target.parentNode);
				_g.currentDates = row;				
				$(tabla.selector+" tbody tr").removeClass('success');
				$(e.target.parentNode).addClass('success');
			}		
		});
	},
	//NOT EFFECT
	setTableNE : function(tabla, columnDefs, datelist){
		if(datelist.length == 0){
			datelist = null;
		}else{
			datelist = datelist;
		}
		var responsiveHelper_datatable_tabletools = undefined;
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};
		var tblDatatable = {};
		if($.fn.DataTable.fnIsDataTable(tabla)){
			_gen.selectRowsTableNE(tabla);
			if(datelist == null){
				tabla.dataTable().fnClearTable();				
			}else{
				tabla.dataTable().fnClearTable();			
				tabla.dataTable().fnAddData(datelist);				
			}
		}else{
			tblDatatable = tabla.dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"oTableTools": {
					 "aButtons": [
					 // "csv",
				     "xls",
				        {
				            "sExtends": "pdf",
				            "sTitle": "Informacion",
				            "sPdfMessage": "Informacion PDF Export",
				            "sPdfSize": "letter"
				        }
				     ],
				    "sSwfPath": "assets/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
				},
				"language": {
		            "info": "Página _PAGE_ de _PAGES_",
		        },
				"autoWidth" : true,
				'aaData' : datelist,
				"aoColumnDefs" : columnDefs,
				"preDrawCallback" : function() {
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper(tabla, breakpointDefinition);
						_gen.selectRowsTableNE(tabla);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			_gen.selectRowsTableNE(tabla);
		}
	},
	selectRowsTableNE: function(tabla){	
		$(tabla.selector+" tbody").click(function(e) {
			if($(e.target.parentNode).hasClass('success')){
				_g.currentDates = {};
				$(e.target.parentNode).removeClass('success');
			}else{
				var row = tabla.fnGetData(e.target.parentNode);				
				_g.currentDates = row;				
				$(tabla.selector+" tbody tr").removeClass('success');
				$(e.target.parentNode).addClass('success');
			}		
		});
	},

	setDataTable: function(tabla, columnDefs, datelist){
		if(datelist.length == 0){
			datelist = null;
		}else{
			datelist = datelist;
		}
		if($.fn.DataTable.fnIsDataTable(tabla)){
			if(datelist == null){
				tabla.dataTable().fnClearTable();				
			}else{
				tabla.dataTable().fnClearTable();			
				tabla.dataTable().fnAddData(datelist);				
			}
			var selectedRows = [];
			//_gen.selectMultipleRowsTable(tabla);
		}else{
			tabla.DataTable({
		        'aaData' : datelist,
				"aoColumnDefs" : columnDefs,
		        "rowCallback": function( row, datelist ) {
		            if ( $.inArray(datelist.DT_RowId, selectedRows) !== -1 ) {
		            	console.log(row);
		                $(row).addClass('success');
		            }
		        }
		    });
			_gen.selectMultipleRowsTable(tabla);
		}

	},

	selectMultipleRowsTable: function(tabla){
		$(tabla.selector+' tbody').on('click', 'tr', function (e) {
			e.preventDefault();
	        _g.currentDates = tabla.dataTable().fnGetData(e.target.parentNode);
	        console.log(_g.currentDates);
	        var id = _g.currentDates['id_datatable'];
	        var index = $.inArray(id, selectedRows);				 
	        if ( index === -1 ) {
	            selectedRows.push( id );
	        } else {
	            selectedRows.splice( index, 1 );
	        }				 
	        $(this).toggleClass('success');
	        console.log(selectedRows);
	    });		
	},

	setDataTableNatural: function(tabla, columnDefs, datelist){
		if(datelist.length == 0){
			datelist = null;
		}else{
			datelist = datelist;
		}
		if($.fn.DataTable.fnIsDataTable(tabla)){
			if(datelist == null){
				tabla.dataTable().fnClearTable();				
			}else{
				tabla.dataTable().fnClearTable();			
				tabla.dataTable().fnAddData(datelist);				
			}
			var selectedRows = [];
		}else{
			tabla.DataTable({
		        'aaData' : datelist,
		        // 'rowId' : 'id',
				"aoColumnDefs" : columnDefs,
		        "rowCallback": function( row, datelist ) {
		            /*if ( $.inArray(datelist.DT_RowId, selectedRows) !== -1 ) {
		                //$(row).addClass('success');
		            }*/
		        }
		    });
		}

	},
}
$(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});
});

jQuery(function($) {
	$.fn.serializeObject = function() {
		var o = {};
		var a = this.serializeArray();
		$.each(a, function() {
			if (o[this.name]) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	};
		
});
function formatDollar(num) {
    var p = num.toFixed(2).split(".");
    return "$" + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "") + "." + p[1];
}

$(document).ready(function(){
	$(".datepickerEs").datepicker({ 
			dateFormat: 'yy-mm-dd',
			language: "es" 
	});
	$('.datepickerEs').change(function(){
		$(this).valid();
	});
	$.datepicker.regional['es'] = {
		 closeText: 'Cerrar',
		 prevText: 'Previo',
		 nextText: 'Próximo',
		 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		 'Jul','Ago','Sep','Oct','Nov','Dic'],
		 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
		 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
		 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
		 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
		 dateFormat: 'dd/mm/yy', firstDay: 0,
		 initStatus: 'Selecciona la fecha', isRTL: false
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	
	if('localStorage' in window && window['localStorage'] !== null) {
	    var storage = localStorage;
	} else { alert('Favor de utilizar un navegador web moderno, ya que es escensial para el funcionamiento correcto de la aplicacion'); }

	$.validator.setDefaults({
	    errorElement: "span",
	    errorClass: "help-block",
	    highlight: function (element, errorClass, validClass) {
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $(element).closest('.form-group').removeClass('has-error');
	    },
	    errorPlacement: function (error, element) {
	        if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
	    return arg != value;
	}, "El campo es obligatorio");
});

function DisableBackButton(){ window.history.forward()}
DisableBackButton();
window.onload = DisableBackButton;
window.onpageshow = function(evt) { if (evt.persisted) DisableBackButton() }
window.onunload = function() { void (0) }

