<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Administrador de 
			<span>> 
				Empleados
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> Empleados <span class="txt-color-greenDark" id="totalE"><i class="fa fa-group"></i>&nbsp;<i class="fa fa-refresh fa-spin txt-color-blueDark"></i></span></h5>
			</li>
			<li class="sparks-info">
				<h5> Cuentas bancarias <span class="txt-color-greenDark" id="totalCB"><i class="fa fa-bank"></i>&nbsp;<i class="fa fa-refresh fa-spin txt-color-blueDark"></i></span></h5>
			</li>		
		</ul>
	</div>
</div>
<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WdtUsuarios">
			<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Listado de empresas</h2>
					<ul id="widget-tab-parametrizacion" class="nav nav-tabs pull-right">
						<li class="active">
							<a data-toggle="tab" href="#Empleados" id="btnMEmpleados"> <i class="fa fa-building"></i> <span class="hidden-mobile hidden-tablet">Empleados</span> </a>
						</li>
						<li>
							<a data-toggle="tab" href="#CuentasBancarias" id="btnMCuentasBancarias"> <i class="fa fa-bank"></i> <span class="hidden-mobile hidden-tablet">Cuentas Bancarias </span></a>
						</li>
					</ul>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="tab-content">
							<div class="tab-pane fade in active fuelux" id="Empleados">																						
								@include('app.administrador_contabilidad.empleados.secciones.empleados')
							</div>
							<div class="tab-pane fade" id="CuentasBancarias">
								@include('app.administrador_contabilidad.empleados.secciones.cuentas_bancarias')
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>

<script type="text/javascript">

	$.get('/api_cont/contador_empleados', function (data){
		$('#totalE, #totalCB').html('');
		$('#totalE').append('<i class="fa fa-building"></i> '+data.empleados);
		$('#totalCB').append('<i class="fa fa-bank"></i> '+data.cuentas_banco);
	});
	pageSetUp();	
</script>
