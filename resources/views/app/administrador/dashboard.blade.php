<div id="page-loader" style="display:none;">
	<ul class="bokeh">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-bar-chart-o fa-fw "></i> 
				Bienvenido 
			<span> > {{Auth::user()->name}}</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
		<div class="btn-group pull-right" style="margin-bottom:15px;">
			
		</div>
	</div>
</div>
<section id="widget-grid" class="">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well">
				<div class="input-group">
					<select class="form-control" id="id_paciente" style="border: 0px solid #ccc;height: 32px;padding: 0;">
					</select>
					<div class="input-group-btn">
						<button class="btn btn-default btn-default" type="button" id="btnConsultarPacientes">
							<i class="fa fa-search"></i> Consultar
						</button>
					</div>
				</div>
			</div>			
		</div>
	</div>
</section>

<script src="{{ asset('js/inicio/dao.js') }}"></script>
<script src="{{ asset('js/inicio/init.js') }}"></script>