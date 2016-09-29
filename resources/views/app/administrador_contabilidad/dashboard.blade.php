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
				<h5> Facturas <span class="txt-color-greenDark"><i class="fa fa-share"></i>&nbsp;0</span></h5>
			</li>
			<li class="sparks-info">
				<h5> Clientes <span class="txt-color-greenDark"><i class="fa fa-cubes"></i>&nbsp;0</span></h5>
			</li>
			<li class="sparks-info">
				<h5> Servicios <span class="txt-color-greenDark"><i class="fa fa-list-alt"></i>&nbsp;0</span></h5>
			</li>
		</ul>
	</div>
</div>
<script src="assets/js/plugin/chartjs/chart.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		pageSetUp();	
	});
</script>