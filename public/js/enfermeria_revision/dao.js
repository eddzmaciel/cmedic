_g.dao = {
	getListadoPreDiagnostico :function(){
		var url = '/api/diagnostico/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataDiagnostico');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "diagnostico"},
				    	          {"aTargets" : [ 4 ], "mData" : "tiempo"},
				    	          {"aTargets" : [ 5 ], "mData" : "heparina"},
				    	          {"aTargets" : [ 6 ], "mData" : "qs"},
				    	          {"aTargets" : [ 7 ], "mData" : "qd"},
				    	          {"aTargets" : [ 8 ], "mData" : "k"},
				    	          {"aTargets" : [ 9 ], "mData" : "temp_ld"},
				    	          {"aTargets" : [ 10 ], "mData" : "na_base"},
				    	          {"aTargets" : [ 11 ], "mData" : "epo"},
				    	          {"aTargets" : [ 12 ], "mData" : "hierro"},
				    	          {"aTargets" : [ 13 ], "mData" : "tipo_acceso"},
				    	          {"aTargets" : [ 14 ], "mData" : "otros"},
				    	          {
									"aTargets": [ 15 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

	getListadoPrePeso :function(){
		var url = '/api/peso/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataPeso');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "peso"},
				    	          {
									"aTargets": [ 4],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

	getListadoPreMedicamentos :function(){
		var url = '/api/medicamento/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataMedicamentos');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "medicamento"},
				    	          {"aTargets" : [ 4 ], "mData" : "dosis"},
				    	          {
									"aTargets": [ 5 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

	//HEMODIALISIS

	getListadoHemoPre :function(){
		var url = '/api/hemodialisis_pre/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataHPRE');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "hora_inicio"},
				    	          {"aTargets" : [ 4 ], "mData" : "hora_termino"},
				    	          {"aTargets" : [ 5 ], "mData" : "tiempo_hd"},
				    	          {"aTargets" : [ 6 ], "mData" : "filtro"},
				    	          {"aTargets" : [ 7 ], "mData" : "no_reuso"},
				    	          {"aTargets" : [ 8 ], "mData" : "na_base"},
				    	          {"aTargets" : [ 9 ], "mData" : "k_acido"},
				    	          {"aTargets" : [ 10 ], "mData" : "temp_ld"},
				    	          {"aTargets" : [ 11 ], "mData" : "peso_ganado"},
				    	          {"aTargets" : [ 12 ], "mData" : "vuf_indicado"},
				    	          {"aTargets" : [ 13 ], "mData" : "vuf_total"},
				    	          {"aTargets" : [ 14 ], "mData" : "vs_procesado"},
				    	          {"aTargets" : [ 15 ], "mData" : "ocm"},
				    	          {"aTargets" : [ 16 ], "mData" : "dosis_hierro"},
				    	          {"aTargets" : [ 17 ], "mData" : "dosis_epo"},
				    	          {
									"aTargets": [ 18 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

	getListadoHemoSignosPre :function(){
		var url = '/api/pre_dialisis/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataHSignosPre');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "ta_sentado"},
				    	          {"aTargets" : [ 4 ], "mData" : "ta_parado"},
				    	          {"aTargets" : [ 5 ], "mData" : "pulso"},
				    	          {"aTargets" : [ 6 ], "mData" : "temp"},
				    	          {"aTargets" : [ 7 ], "mData" : "peso"},					    	          
				    	          {
									"aTargets": [ 8 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

	getListadoHemoSignosPost :function(){
		var url = '/api/post_dialisis/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataHSignosPost');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "ta_sentado"},
				    	          {"aTargets" : [ 4 ], "mData" : "ta_parado"},
				    	          {"aTargets" : [ 5 ], "mData" : "pulso"},
				    	          {"aTargets" : [ 6 ], "mData" : "temp"},
				    	          {"aTargets" : [ 7 ], "mData" : "peso"},					    	          
				    	          {
									"aTargets": [ 8 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

	getListadoHemoEvolucion :function(){
		var url = '/api/evolucion/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataHEvolucion');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "horario"},
				    	          {"aTargets" : [ 4 ], "mData" : "ta"},
				    	          {"aTargets" : [ 5 ], "mData" : "p"},
				    	          {"aTargets" : [ 6 ], "mData" : "qs"},
				    	          {"aTargets" : [ 7 ], "mData" : "qd"},					    	          
				    	          {"aTargets" : [ 8 ], "mData" : "pa"},					    	          
				    	          {"aTargets" : [ 9 ], "mData" : "pv"},					    	          
				    	          {"aTargets" : [ 10 ], "mData" : "uf"},					    	          
				    	          {"aTargets" : [ 11 ], "mData" : "heparina"},					    	          
				    	          {"aTargets" : [ 12 ], "mData" : "liquidos"},					    	          
				    	          {"aTargets" : [ 13 ], "mData" : "temp"},					    	          
				    	          {"aTargets" : [ 14 ], "mData" : "nota_enfermeria"},				    	          
				    	          {
									"aTargets": [ 15 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

	getListadoHemoOtros :function(){
		var url = '/api/hemodialisis_otros/'+localStorage["id_cita"];
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){
				var table = $('#tblDataHOtros');
				var columnDefs = [{"aTargets" : [ 0 ], "mData" : "id_cita_historico"},									  
				    	          {"aTargets" : [ 1 ], "mData" : "fecha"},
				    	          {"aTargets" : [ 2 ], "mData" : "id_usuario"},
				    	          {"aTargets" : [ 3 ], "mData" : "hipotension"},
				    	          {"aTargets" : [ 4 ], "mData" : "calambres"},
				    	          {"aTargets" : [ 5 ], "mData" : "cefalea"},
				    	          {"aTargets" : [ 6 ], "mData" : "calofrios"},
				    	          {"aTargets" : [ 7 ], "mData" : "secrecion"},					    	          
				    	          {"aTargets" : [ 8 ], "mData" : "eritema"},					    	          
				    	          {"aTargets" : [ 9 ], "mData" : "fiebre"},					    	          
				    	          {"aTargets" : [ 10 ], "mData" : "otras_complicaciones"},					    	          
				    	          {"aTargets" : [ 11 ], "mData" : "otros_medicamentos"},					    	          
				    	          {"aTargets" : [ 12 ], "mData" : "observaciones"},					    	          				    	          
				    	          {
									"aTargets": [ 13 ],
									"mData": null,
									"mRender": function (o) { 
										return '<a class="btn btn-sm btn-success" data-original-title="Entrar a Sesion" onclick="_g.dao.getSeleccionarPaciente(' + o.id_paciente +','+ o.id_cita + ')">' + '<i class="glyphicon glyphicon-ok-circle"></i> Seleccionar</a>&nbsp;' ; 
									}
								  }];
				if(data.length != 0){
					var datelist = data;							
				}else{
					var datelist = {};							
				}
				_gen.setTable(table,columnDefs,datelist);
			}
		});
	},

};