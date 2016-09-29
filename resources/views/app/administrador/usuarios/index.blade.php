<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Administrador 
			<span>> 
				Usuarios
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5 id="total_usuarios"></h5>
			</li>
			<li class="sparks-info">
				<h5 id="activos_usuarios"></h5>
			</li>
			<li class="sparks-info">
				<h5 id="inactivos_usuarios"></h5>
			</li>
		</ul>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WdtUsuarios">
			<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-collapsed="true">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Listado de Usuarios</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar" id="btnGroupButton" style="padding-bottom:0px;">
							<div class="row">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<!-- @if (Auth::user()->role_id === 1)
									<form class="smart-form">
										<div class="row">
											<section class="col col-10">
												<label class="select">
													<select class="form-control select2" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
													</select> <i></i> </label>								
											</section>
										</div>
									</form>
									@endif -->
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-right">								
									<button class="btn btn-labeled btn-primary" type="button" onclick="window.location.href='/#admin/usuarios/nuevo'">
										<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
										Nuevo
									</button>	
									<button class="btn btn-labeled btn-success" type="button" id="btnEditar">
										<span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>
										Editar
									</button>		
									<button class="btn btn-labeled btn-danger" type="button" id="btnEliminar">
										<span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>
										Eliminar
									</button>								
								</div>
							</div>
						</div>						
						<div class="table-responsive">
							<table id="tblDataUsuarios" class="table table-hover table-striped" width="100%">
								<thead>
									<tr>
										<th data-class="expand">Id</th>
										<th width="55px">Foto</th>
										<th data-hide="phone">Nombre</th>
										<th data-hide="phone,tablet">Correo</th>
										<th data-hide="phone,tablet">Telefono</th>
										<th data-hide="phone,tablet">Direccion</th>
										<th data-hide="phone,tablet">Estatus</th>
										<th width="65px">Acciones</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
<script src="{{ asset('js/usuarios/dao.js') }}"></script>
<script src="{{ asset('js/usuarios/init.js') }}"></script>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		/*_g.listas.getSucursales();*/
	};
	pagefunction();
</script>

