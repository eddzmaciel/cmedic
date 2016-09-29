$(document).ready(function() {
    localStorage.removeItem("id_empresa"), $(".datepickerEs").datepicker({
        dateFormat: "yy-mm-dd",
        language: "es"
    })
});
var pagefunction = function() {
    _g.listas.getEmpresas(), $("#btnNuevo").click(function() {
        0 != $("#id_empresa").val() ? window.location.href = "/#contabilidad/poliza_manual/nuevo" : _gen.notificacion_min("Error", "Es necesario seleccionar una empresa", 4)
    }), $("#btnConsultar").click(function() {
        0 != $("#id_empresa").val() ? _g.dao.getPolizasBancos() : _gen.notificacion_min("Error", "Es necesario seleccionar una empresa", 4)
    }), $("#id_empresa").change(function(a) {
        _g.dao.getPolizasBancos(), _g.listas.getEmpresasSucursales(), localStorage.id_empresa = $("#id_empresa").val()
    })
};
_g.dao = {

    getPolizasBancos: function() {
        var a = {
            id_empresa: $("#id_empresa").val(),
            id_sucursal: $("#id_sucursal").val(),
            fecha_poliza: $("#fecha_poliza").val(),
            tipo_poliza: $("#tipo_poliza").val(),
            num_operacion: $("#num_operacion").val(),
            tipo_operacion: $("#tipo_operacion").val(),
            concepto_poliza: $("#concepto_poliza").val(),
            folio: $("#folio").val(),
            fecha_desde: $("#fecha_desde").val(),
            fecha_hasta: $("#fecha_hasta").val()
        };
        $.ajax({
            data: a,
            url: "/api_cont/polizas_manuales_avanzada",
            type: "POST",
            dataType: "json",
            success: function(a) {
                var b = [];
                console.log(a), 0 != a.length && ($.each(a, function(b) {
                    0 != a[b].movimientos_bancarios && null != a[b].movimientos_bancarios || (a[b].movimientos_bancarios = '<a href="javascript:void(0);" readonly="true" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></a>'), "on" == a[b].movimientos_bancarios && (a[b].movimientos_bancarios = '<a href="javascript:void(0);" readonly="true" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>')
                }), b = a);
                var c = $("#tblPolizasManuales"),
                    d = [{
                        aTargets: [0],
                        mData: "tipo_poliza"
                    }, {
                        aTargets: [1],
                        mData: "fecha"
                    }, {
                        aTargets: [2],
                        mData: "poliza"
                    }, {
                        aTargets: [3],
                        mData: "concepto"
                    }, {
                        aTargets: [4],
                        mData: "tipo_documento"
                    }, {
                        aTargets: [5],
                        mData: "num_documento"
                    }, {
                        aTargets: [6],
                        mData: "movimientos_bancarios"
                    }, {
                        aTargets: [7],
                        mData: null,
                        mRender: function(a) {
                            return '<center><a class="btn btn-sm btn-success" target="_blank" onclick="_g.dao.getModalPDF('+a.id+')"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;<a class="btn btn-sm btn-success" onclick="_g.dao.getModificarDatos('+a.id+')"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;<a class="btn btn-sm btn-danger" onclick="_g.dao.getEliminarDatos('+a.id+')"><i class="glyphicon glyphicon-trash"></i></a>&nbsp; </center>'
                        }
                    }];
                _gen.setTableNE(c, d, b), $("#infoBancosEmpresas").show("slow")
            }
        })
    },
    getModalPDF: function(a) {
        var b = "/api_cont/reporte_poliza_manual/" + a;
        $("#PDFPreview").attr("src", b), $("#infoPreviewPDF").modal("show")
    },
    getEliminarDatos :function(id){
                $.ajax({
                    url: '/api_cont/polizas_manuales/'+id,
                    type: 'DELETE',
                    dataType: 'json',           
                }).done(function(data){
                    _g.dao.getPolizasBancos();
                    _gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
                }).fail(function(data){
                    _gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de eliminar, intente de nuevo.',4);
                });
    },
        getModificarDatos :function(id){
                        $.ajax({
                            url: '/api_cont/info_polizasbancos/'+id,
                            type: 'GET',
                            dataType: 'json',           
                        }).done(function(data){
                            _g.dao.getLimpiarDatos();           
                            $('#edt0').val(id);
                            $('#edt1').val(data.tipo_poliza);
                            $('#edt2').val(data.fecha);
                            $('#edt3').val(data.poliza);
                            $('#edt4').val(data.concepto);
                            $('#edt5').val(data.tipo_documento);
                            $('#edt6').val(data.num_documento);
                            $('#edt7').val(data.movimientos_bancarios);


                            $('#EditarDatosModal').modal('show');       
                        }).fail(function(data){
                            _gen.notificacion_min('Aviso', 'Al parecer se presento un problema al momento de modificar la información, intente de nuevo.',4);
                        });
    },
    getLimpiarDatos :function(){
                $('#edt1').val('');
                $('#edt2').val('');
                $('#edt3').val('');
                $('#edt4').val('');
                $('#edt5').val('');
                $('#edt6').val('');
                $('#edt7').val('');
           
            }

}, 
pagefunction();




     var functionOperacionesForm = function() {
         
                $('#btnAceptarEditar').on('click',function (e){
                    e.preventDefault();
                    if($("#frmEditarDatos").valid() == true && $("#edt0").val() != ''){
                        $.ajax({
                            url: '/api_cont/polizas_bancos/'+$("#edt0").val(),
                            data: $('#frmEditarDatos').serializeObject(),
                            type: 'PUT'
                        }).done(function(data) {
                            _g.dao.getLimpiarDatos();
                            _gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
                            $('#EditarDatosModal').modal('hide');
                                _g.dao.getPolizasBancos();
                        }).fail(function(data) {
                            _gen.notificacion_min('Error', data.responseText,4);
                            $('#EditarDatosModal').modal('hide');
                            _g.dao.getPolizasBancos();
                        });
                    }
                });

            

                 $('#btnAceptarEditarSm1').on('click',function (e){
                    e.preventDefault();
                    if($("#EditarDatosSubModal1").valid() == true && $("#edt1_0").val() != ''){
                        $.ajax({
                            url: '/api_cont/movimientos_balanza/'+$("#edt0").val(),
                            data: $('#EditarDatosSubModal1').serializeObject(),
                            type: 'PUT'
                        }).done(function(data) {
                            _g.dao.getLimpiarDatos();
                            _gen.notificacion_min('&Eacute;xito', 'La operaci&oacute;n se realiz&oacute; exitosamente',1);
                            $('#EditarDatosSubModal1').modal('hide');
                                _g.dao.getPolizasBancos();
                        }).fail(function(data) {
                            _gen.notificacion_min('Error', data.responseText,4);
                            $('#EditarDatosSubModal1').modal('hide');
                            _g.dao.getPolizasBancos();
                        });
                    }
                });

    
             /*   $('#btnCancelarEditar').click(function (e){
                    e.preventDefault();
                    $( '#EditarDatosModal').hide();
                    //$('#cargandoInfoEmpresas').show('slow');
                });*/
       

            }; 

functionOperacionesForm(); 



