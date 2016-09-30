<div id="page-loader" style="display:none;">
	<ul class="bokeh">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
<div class="row animated bounceIn">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-bar-chart-o fa-fw "></i> 
				Bienvenido 
			<span> > {{Auth::user()->name}}</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> Medicos <span class="txt-color-greenDark"><i class="fa fa-share"></i>&nbsp;0</span></h5>
			</li>
			<li class="sparks-info">
				<h5> Pacientes <span class="txt-color-greenDark"><i class="fa fa-cubes"></i>&nbsp;0</span></h5>
			</li>
			<li class="sparks-info">
				<h5> Citas <span class="txt-color-greenDark"><i class="fa fa-list-alt"></i>&nbsp;0</span></h5>
			</li>
		</ul>
	</div>
</div>

<div class="row">
	<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="well">
			<div class="input-group">
				<select class="form-control" id="s2Directorio">
					<option value="0">Seleccione un Paciente</option>
				</select>
				<div class="input-group-btn">
					<button class="btn btn-default btn-primary" type="button" id="btnDetalleInformacion">
						<i class="fa fa-search"></i> Ver Informacion
					</button>
				</div>
			</div>
		</div>				
		<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
			<header>
				<h2>Historial de Citas </h2>				
			</header>
			<div>
				<div class="jarviswidget-editbox">
					<input class="form-control" type="text">	
				</div>
				<div class="widget-body">
					<canvas id="barChart" height="120"></canvas>
				</div>
			</div>
		</div>
	</article>
	<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="well">
			<div class="input-group">
				<select class="form-control" id="s2Directorio">
					<option value="0">Seleccione una Cita Médica</option>
				</select>
				<div class="input-group-btn">
					<button class="btn btn-default btn-primary" type="button" id="btnDetalleInformacion">
						<i class="fa fa-search"></i> Ver Informacion
					</button>
				</div>
			</div>
		</div>
		<div class="jarviswidget" id="wid-id-3" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false">
			<header>
				<h2>Medicamentos Recetados </h2>				
			</header>
			<div>
				<div class="jarviswidget-editbox">
					<input class="form-control" type="text">	
				</div>
				<div class="widget-body">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Ibuprofeno <span class="pull-right">8 piezas</span> </span>
							<div class="progress progress-xs">
								<div class="progress-bar bg-color-blueDark" style="width: 65%;"></div>
							</div> </div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Paracetamol <span class="pull-right">14 Piezas</span> </span>
							<div class="progress progress-xs">
								<div class="progress-bar bg-color-blue" style="width: 34%;"></div>
							</div> </div>
						<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Penicilina<span class="pull-right">5 Unidades</span> </span>
							<div class="progress progress-xs">
								<div class="progress-bar bg-color-blue" style="width: 77%;"></div>
							</div> </div>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>
<div class="row">
	<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	</article>
	<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	</article>
</div>
<script src="assets/js/plugin/chartjs/chart.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	pageSetUp();
	var barOptions = {
	    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
	    scaleBeginAtZero : true,
	    //Boolean - Whether grid lines are shown across the chart
	    scaleShowGridLines : true,
	    //String - Colour of the grid lines
	    scaleGridLineColor : "rgba(0,0,0,.05)",
	    //Number - Width of the grid lines
	    scaleGridLineWidth : 1,
	    //Boolean - If there is a stroke on each bar
	    barShowStroke : true,
	    //Number - Pixel width of the bar stroke
	    barStrokeWidth : 1,
	    //Number - Spacing between each of the X value sets
	    barValueSpacing : 5,
	    //Number - Spacing between data sets within X values
	    barDatasetSpacing : 1,
	    //Boolean - Re-draw chart on page resize
        responsive: true,
	    //String - A legend template
	    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    }

    var barData = {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
         datasets: [
	        {
	            label: "My First dataset",
	            fillColor: "rgba(220,220,220,0.5)",
	            strokeColor: "rgba(220,220,220,0.8)",
	            highlightFill: "rgba(220,220,220,0.75)",
	            highlightStroke: "rgba(220,220,220,1)",
	            data: [65, 59, 80, 81, 56, 55, 40]
	        },
	        {
	            label: "My Second dataset",
	            fillColor: "rgba(151,187,205,0.5)",
	            strokeColor: "rgba(151,187,205,0.8)",
	            highlightFill: "rgba(151,187,205,0.75)",
	            highlightStroke: "rgba(151,187,205,1)",
	            data: [28, 48, 40, 19, 86, 27, 90]
	        }
	    ]
    };

    // render chart
    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);
	})
</script>