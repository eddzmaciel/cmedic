<!-- INDEX CLIENTES-->

<!--<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Catálogo de 
			<span>> 
				Clientes
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> Clientes <span class="txt-color-greenDark" id="totalCC"><i class="fa fa-building"></i>&nbsp;<i class="fa fa-refresh fa-spin txt-color-blueDark"></i></span></h5>
			</li>
					<li class="sparks-info">
				<h5> Cuentas bancarias <span class="txt-color-greenDark" id="totalCBC"><i class="fa fa-bank"></i>&nbsp;<i class="fa fa-refresh fa-spin txt-color-blueDark"></i></span></h5>
			</li>		
		</ul>
	</div>
</div> -->

<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WdtUsuarios">
			<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Listado de Proveedores</h2>
					<!-- MENU INDEX CLIENTES-->
					<ul id="widget-tab-parametrizacion" class="nav nav-tabs pull-right">
						<li class="active">
							<a data-toggle="tab" href="#proveedores" id="btnMEmpresas"> <i class="fa fa-users"></i> <span class="hidden-mobile hidden-tablet">General</span> </a>
						</li>
						<li>
							<a data-toggle="tab" href="#CuentasBancarias" id="btnMCuentasBancarias"> <i class="fa fa-bank"></i> <span class="hidden-mobile hidden-tablet">Sucursales </span></a>
						</li>
						<li>
							<a data-toggle="tab" href="#" id="btnMCuentasBancarias"> <i class="fa fa-bullseye"></i> <span class="hidden-mobile hidden-tablet">Asignaci&oacute;n Centros</span></a>
						</li>
						<li>
							<a data-toggle="tab" href="#" id="btnMCuentasBancarias"> <i class="fa fa-male"></i> <span class="hidden-mobile hidden-tablet">Cliente Comercial</span></a>
						</li>
						<li>
							<a data-toggle="tab" href="#" id="btnMCuentasBancarias"> <i class="fa fa-share-alt"></i> <span class="hidden-mobile hidden-tablet">Conexi&oacute;n Online</span></a>
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
								@include('app.administrador_contabilidad.proveedores.secciones.listado_proveedores')
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
	$.get('/api_cont/contador_clientes', function (data){
		$('#totalCC, #totalCBC').html('');
		$('#totalCC').append('<i class="fa fa-building"></i> '+data.clientes);
		$('#totalCBC').append('<i class="fa fa-cube"></i> '+data.cuentas_clientes);
	});
	pageSetUp();	
</script>
<!-- // SCRIPT-->