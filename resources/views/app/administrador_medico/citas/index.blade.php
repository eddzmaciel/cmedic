

<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WdtUsuarios">
			<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Programa de Citas </h2>
					<!-- MENU INDEX CLIENTES-->
					<ul id="widget-tab-parametrizacion" class="nav nav-tabs pull-right">
						<li class="active">
							<a data-toggle="tab" href="#proveedores" id="btnMEmpresas"> <i class="fa fa-users"></i> <span class="hidden-mobile hidden-tablet">General</span> </a>
						</li>
						
					</ul>
					<!-- // MENU INDEX proveedores-->
				</header>
				<!-- CONTENIDO  SECCIONES-->
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="tab-content">
							<div class="tab-pane fade in active fuelux" id="proveedores">
								@include('app.administrador_medico.citas.secciones.listado_citas')
							</div>
							<div class="tab-pane fade" id="CuentasBancarias">
							
							</div>
						</div>
					</div>
				</div>
				<!--// CONTENIDO SECCIONES-->
			</div>
		</article>
	</div>
</section>
<!-- SCRIPT-->
<script type="text/javascript">
	/*$.get('/api_cont/contador_clientes', function (data){
		$('#totalCC, #totalCBC').html('');
		$('#totalCC').append('<i class="fa fa-building"></i> '+data.clientes);
		$('#totalCBC').append('<i class="fa fa-cube"></i> '+data.cuentas_clientes);
	});
	pageSetUp();	*/
</script>
<!-- // SCRIPT-->