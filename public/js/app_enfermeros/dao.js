_g.dao = {
	getEstaciones :function(){
		$.ajax({
			url: '/api_admin/estaciones',
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$('#estaciones').append('<div class="col-xs-12 col-sm-4 col-md-2">'+
								            '<div class="panel panel-greenLight">'+								            	
								                '<div class="panel-heading">'+
								                    '<h3 class="panel-title">Disponible</h3>'+
								                '</div>'+
								                '<div class="panel-body no-padding text-align-center">'+
								                    '<div class="the-price">'+
								                    	'<div class="row">'+
								                        	'<img src="/img/lugar_disponible.png" alt="" class="img-responsive">'+
								                    	'</div>'+
								                    '</div>'+
								                    '<table class="table">'+
								                        '<tbody><tr>'+
								                            '<td></td>'+
								                        '</tr>'+
								                        '<tr><td>Informaci&oacute;n adicional</td> </tr></tbody>'+
								                    '</table>'+
								                '</div>'+
								                '<div class="panel-footer no-padding">'+
								                    '<a href="/enfermero/inicio" class="btn bg-color-greenLight txt-color-white btn-block" role="button">Seleccionar</a>'+
								                '</div>'+
								            '</div>'+
								        '</div>');			
			}
		});
	},
};