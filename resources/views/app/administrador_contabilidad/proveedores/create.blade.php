<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Nuevo 
			<span>> 
				Proveedor
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">		
		</ul>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="WfrmUsuarios">
			<div class="jarviswidget" id="wid-id-100" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Formulario </h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding fuelux">
						<div class="wizard">
							<ul class="steps">
								<li data-target="#step1" class="active">
									<span class="badge badge-info">1</span>GENERAL<span class="chevron"></span>
								</li>
								<li data-target="#step2">
									<span class="badge">2</span>SUCURSALES<span class="chevron"></span>
								</li>
								<li data-target="#step3">
									<span class="badge">3</span>ASIGNACION CENTROS<span class="chevron"></span>
								</li>
								<li data-target="#step4">
									<span class="badge">4</span>CLIENTE COMERCIAL<span class="chevron"></span>
								</li>
								<li data-target="#step5">
									<span class="badge">5</span>CONEXION ONLINE<span class="chevron"></span>
								</li>												
							</ul>
							<div class="actions">
								<button type="button" class="btn btn-sm btn-primary btn-prev">
									<i class="fa fa-arrow-left"></i>Anterior
								</button>
								<button type="button" class="btn btn-sm btn-success btn-next" data-last="Finish">
									Siguiente<i class="fa fa-arrow-right"></i>
								</button>
							</div>
						</div>
						<div class="step-content">
							<div class="step-pane active" id="step1">
								<form action="/api_cont/proveedores" id="frmProveedores" method="POST" class="smart-form">
									<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
									<fieldset>
										<div class="row">
											<section class="col col-4">
												<label class="select">
													<select class="form-control" name="id_empresa" id="id_empresa" style="border: 0px solid #ccc;height: 32px;padding: 0;">
													</select> <i></i> </label>
											</section>
											<section class="col col-4">
												<label class="select">
													<select class="form-control" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
														<option value="">Seleccione una empresa</option>
													</select> <i></i> </label>
											</section>									
										</div>
										<div class="row">										
											<section class="col col-4">
												<label class="label">Nombre del proveedor</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">RFC</label>
												<label class="input">
													<input type="text" class="input-sm" name="rfc" id="rfc">
												</label>
											</section>
											<section class="col col-2">
												<label class="label">Fecha de alta</label>
												<label class="input">
													<input type="text" class="input-sm datepicker" name="fecha_alta" id="fecha_alta">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Nombre Corto</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre_corto" id="nombre_corto">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">Ranking de cliente</label>
												<label class="select">
													<select class="input-sm" name="ranking" id="ranking">
														<option value="1">Seleccione ranking</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
														<option value="18">18</option>
														<option value="19">19</option>
														<option value="20">20</option>
														<option value="21">21</option>
														<option value="22">22</option>
														<option value="23">23</option>
														<option value="24">24</option>
														<option value="25">25</option>
														<option value="26">26</option>
														<option value="27">27</option>
														<option value="28">28</option>
														<option value="29">29</option>
														<option value="30">30</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-5">
												<label class="label">Cuenta contable</label>
												<label class="select">
													<select class="input-sm" name="id_cuenta_contable" id="id_cuenta_contable">
														<option value="1">Seleccione cuenta</option>
														
													</select> <i></i> </label>
											</section>									
											<section class="col col-3">
												<label class="label">Calle</label>
												<label class="input">
													<input type="text" class="input-sm" name="calle" id="calle">
												</label>
											</section>
											<section class="col col-2">
												<label class="label"># Exterior</label>
												<label class="input">
													<input type="text" class="input-sm" name="num_exterior" id="num_exterior">
												</label>
											</section>
											<section class="col col-2">
												<label class="label"># Interior</label>
												<label class="input">
													<input type="text" class="input-sm" name="num_interior" id="num_interior">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Colonia</label>
												<label class="input">
													<input type="text" class="input-sm" name="colonia" id="colonia">
												</label>
											</section>
											<section class="col col-2">
												<label class="label">Codigo Postal</label>
												<label class="input">
													<input type="text" class="input-sm" name="codigo_postal" id="codigo_postal">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">TAX-ID</label>
												<label class="input">
													<input type="text" class="input-sm" name="tax-id" id="tax-id">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">Ciudad / Municipio</label>
												<label class="select">
													<select class="input-sm" name="ciudad_municipio" id="ciudad_municipio">
														<option value="1">Seleccione municipio</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-4">
												<label class="label">Estado</label>
												<label class="select">
													<select class="input-sm" name="estado" id="estado">
														<option value="1">Seleccione estaddo</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-4">
												<label class="label">Pais</label>
												<label class="select">
													<select class="input-sm" name="pais" id="pais">
														<option value="1">Seleccione pais</option>
													</select> <i></i> </label>
											</section>																																			
											<section class="col col-3">
												<label class="label">Email 1</label>
												<label class="input">
													<input type="text" class="input-sm" name="email_uno" id="email_uno">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Email 2 </label>
												<label class="input">
													<input type="text" class="input-sm" name="email_dos" id="email_dos">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Email 3 </label>
												<label class="input">
													<input type="text" class="input-sm" name="email_dos" id="email_tres">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Sitio Web</label>
												<label class="input">
													<input type="text" class="input-sm" name="sitio_web" id="sitio_web">
												</label>
											</section>
										</div>							
									</fieldset>														
									<footer>
										<button type="submit" id="btnAdd" class="btn btn-primary">
											Agregar
										</button>
										<button type="button" id="btnCancel" class="btn btn-default" onclick="window.history.back();">
											Cancelar
										</button>
									</footer>
								</form>
								<div class="row" style="margin: 25px 0 0;">
									<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
										<form class="smart-form">
											<div class="row">
												<section class="col col-4">
													<label class="select">
														<select class="form-control select2" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
															<option value="1">Banco</option>
														</select> <i></i> </label>								
												</section>
												<section class="col col-4">
													<label class="select">
														<select class="input-sm select2" name="estatus_table" id="estatus_table">
															<option value="1">Moneda</option>
														</select> <i></i> </label>								
												</section>
												<section class="col col-4">
													<label class="select">
														<select class="input-sm select2" name="estatus_table" id="estatus_table">
															<option value="1">#Cuenta</option>
														</select> <i></i> </label>								
												</section>
											</div>
										</form>
									</div>
									<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
										<button class="btn btn-labeled btn-primary" type="button" id="btnNew" onclick="window.location.href='/#facturacion/cuentas/nuevo">
											<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
											Agregar
										</button>
										<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
											<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
											Modificar
										</button>																										
									</div><br>
								</div>
								<div class="table-responsive">
									<table id="tbl2" class="table table-hover table-striped" width="100%">
										<thead>
											<tr>
												<th data-class="expand">Id</th>
												<th data-hide="phone">Banco</th>
												<th data-hide="phone">Moneda</th>
												<th data-hide="phone"># Cuenta</th>
												<th data-hide="phone">Principal</th>
												<th data-hide="phone">Puesto</th>										
												<th width="65px">Acciones</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="row" style="margin: 25px 0 0;">
									<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
										<form class="smart-form">
											<div class="row">
												<section class="col col-4">
													<label class="label">Contacto</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Puesto</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Telefono</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-2">
													<label class="label">Ext</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-5">
													<label class="label">Email</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-5">
													<label class="label">Telefono</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
											</div>
										</form>
									</div>
									<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
										<button class="btn btn-labeled btn-primary" type="button" id="btnNew" onclick="window.location.href='/#facturacion/cuentas/nuevo">
											<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
											Agregar
										</button>
										<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
											<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
											Modificar
										</button>																										
									</div>
								</div>
								<div class="table-responsive">
									<table id="tbl1" class="table table-hover table-striped" width="100%">
										<thead>
											<tr>
												<th data-class="expand">Id</th>
												<th data-hide="phone">Contacto</th>
												<th data-hide="phone">Nombre</th>
												<th data-hide="phone">Telefono</th>
												<th data-hide="phone">Email</th>
												<th data-hide="phone">Puesto</th>
												<th data-hide="phone">Tipo de contacto</th>										
												<th width="65px">Acciones</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<!-- <div class="step-pane" id="step2">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 25px 0 0;">
									<form class="smart-form">
										<div class="row">
											<section class="col col-4">
												<label class="label"># Cliente</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">Nombre del cliente</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">RFC</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-4">
												<label class="label">Seleccione</label>
												<label class="select">
													<select class="form-control select2" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
														<option value="1">1</option>
														<option value="1">2</option>
														<option value="1">3</option>
													</select> <i></i> </label>								
											</section>
											<section class="col col-4">
												<label class="label">Nombre de Sucursal</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-4">
												<label class="label">Nombre corto</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-3">
												<label class="label">Calle</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-2">
												<label class="label"># Exterior</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-2">
												<label class="label"># Interior</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Colonia</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-2">
												<label class="label">Codigo Postal</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
										</div>
										<div class="row">
											<section class="col col-4">
												<label class="label">Ciudad / Municipio</label>
												<label class="select">
													<select class="input-sm" name="estatus" id="estatus">
														<option value="1">Seleccione municipio</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-4">
												<label class="label">Estado</label>
												<label class="select">
													<select class="input-sm" name="estatus" id="estatus">
														<option value="1">Seleccione estaddo</option>
													</select> <i></i> </label>
											</section>
											<section class="col col-4">
												<label class="label">Pais</label>
												<label class="select">
													<select class="input-sm" name="estatus" id="estatus">
														<option value="1">Seleccione pais</option>
													</select> <i></i> </label>
											</section>
										</div>
										<div class="row">
											<section class="col col-3">
												<label class="label">Contacto</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Puesto</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Telefono</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
											<section class="col col-3">
												<label class="label">Email</label>
												<label class="input">
													<input type="text" class="input-sm" name="nombre" id="nombre">
												</label>
											</section>
										</div>										
									</form>
								</div>
								<div class="row" style="margin: 25px 0 0;">
									<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
										<form class="smart-form">
											<div class="row">
												<section class="col col-4">
													<label class="select">
														<select class="form-control select2" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
															<option value="1">Banco</option>
														</select> <i></i> </label>								
												</section>
												<section class="col col-4">
													<label class="select">
														<select class="input-sm select2" name="estatus_table" id="estatus_table">
															<option value="1">Moneda</option>
														</select> <i></i> </label>								
												</section>
												<section class="col col-4">
													<label class="select">
														<select class="input-sm select2" name="estatus_table" id="estatus_table">
															<option value="1">#Cuenta</option>
														</select> <i></i> </label>								
												</section>
											</div>
										</form>
									</div>
									<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
										<button class="btn btn-labeled btn-primary" type="button" id="btnNew" onclick="window.location.href='/#facturacion/cuentas/nuevo">
											<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
											Agregar
										</button>
										<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
											<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
											Modificar
										</button>																										
									</div><br>
								</div><br>
								<div class="table-responsive">									
									<table id="tbl3" class="table table-hover table-striped" width="100%">
										<thead>
											<tr>
												<th data-class="expand">Id</th>
												<th data-hide="phone">Sucursales</th>
												<th data-hide="phone">Nombre corto de sucursal</th>
												<th data-hide="phone">Contacto</th>
												<th data-hide="phone">Telefono</th>
												<th data-hide="phone">Email</th>										
												<th width="65px">Acciones</th>
											</tr>
										</thead>
									</table>
								</div>
							</div> -->
							<!-- <div class="step-pane" id="step3">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin: 25px 0 0;">
									<form class="smart-form">
										<div class="row">
											<section class="col col-4">
												<label class="select">
													<select class="form-control select2" name="id_sucursal" id="id_sucursal" style="border: 0px solid #ccc;height: 32px;padding: 0;">
														<option value="1">Sucursal</option>
													</select> <i></i> </label>								
											</section>
											<section class="col col-4">
												<label class="select">
													<select class="input-sm select2" name="estatus_table" id="estatus_table">
														<option value="1">Centros de costos</option>
													</select> <i></i> </label>								
											</section>
											<section class="col col-2">
												<label class="select">
													<select class="input-sm select2" name="estatus_table" id="estatus_table">
														<option value="1">1</option>
														<option value="1">2</option>
														<option value="1">3</option>
													</select> <i></i> </label>								
											</section>
											<section class="col col-2">
												<label class="select">
													<select class="input-sm select2" name="estatus_table" id="estatus_table">
														<option value="1">S Costos</option>
													</select> <i></i> </label>								
											</section>
										</div>
									</form>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
									<button class="btn btn-labeled btn-primary" type="button" id="btnNew" onclick="window.location.href='/#facturacion/cuentas/nuevo">
										<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
										Agregar
									</button>
									<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
										<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
										Modificar
									</button>																										
								</div><br>
								<div class="table-responsive">
									<table id="tbl4" class="table table-hover table-striped" width="100%">
										<thead>
											<tr>
												<th data-class="expand">Id</th>
												<th data-hide="phone">Sucursal</th>
												<th data-hide="phone">Centro de costos</th>
												<th data-hide="phone">Numero</th>
												<th data-hide="phone">SCosots</th>
											</tr>
										</thead>
									</table>
								</div>
							</div> -->
							<!-- <div class="step-pane" id="step4">
									<form action="#" id="frmEstaciones" method="POST" class="smart-form">
										<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
										<fieldset>
											<div class="row">
												<section class="col col-4">
													<label class="label"># Cliente</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Nombre del cliente</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">RFC</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Categoria de Cliente</label>
													<label class="select">
														<select class="input-sm" name="estatus" id="estatus">
															<option value="1">Seleccione categoria</option>
														</select> <i></i> </label>
												</section>
												<section class="col col-4">
													<label class="label">Ranking</label>
													<label class="select">
														<select class="input-sm" name="estatus" id="estatus">
															<option value="1">80/20</option>
														</select> <i></i> </label>
												</section>
												<section class="col col-4">
													<label class="label">Zona/Region</label>
													<label class="select">
														<select class="input-sm" name="estatus" id="estatus">
															<option value="1">Seleccione Zona/Region</option>
														</select> <i></i> </label>
												</section>
												<section class="col col-4">
													<label class="label">Vendedor</label>
													<label class="select">
														<select class="input-sm" name="estatus" id="estatus">
															<option value="1">Seleccione Vendedor</option>
														</select> <i></i> </label>
												</section>
												<section class="col col-4">
													<label class="label">Lista de Precios Aplicable</label>
													<label class="select">
														<select class="input-sm" name="estatus" id="estatus">
															<option value="1">Seleccione lista de precios</option>
														</select> <i></i> </label>
												</section>
												<section class="col col-6">
													<label class="label">Limite de credito</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-3">
													<label class="label">Dias de credito</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-2">
													<label class="label">Dias de envio de factura</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-2">
													<label class="label">Dias de recepcion de factura</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-3">
													<label class="label">Dias de pago del cliente</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-6">
													<label class="label"># de dias</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
														<div class="note">
															<strong>Antes</strong> de vencimiento para considerar pronto pago y otorgar descuento
														</div>
													</label>
												</section>
											</div>							
										</fieldset>														
										<footer>
											<button type="button" id="btnAdd" class="btn btn-primary">
												Agregar
											</button>
											<button type="button" id="btnCancel" class="btn btn-default" onclick="window.history.back();">
												Cancelar
											</button>
										</footer>
									</form>
									<div class="row" style="margin: 25px 0 0;">
										<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
											<form class="smart-form">
												<div class="row">
													<section class="col col-6">
														<label class="label">Descuento</label>
														<label class="select">
															<select class="input-sm" name="estatus" id="estatus">
																<option value="1">Descuento #1</option>
																<option value="2">Descuento #2</option>
																<option value="3">Descuento #3</option>
															</select> <i></i> </label>
													</section>
													<section class="col col-2">
														<label class="label">%</label>
														<label class="input">
															<input type="text" class="input-sm" name="nombre" id="nombre">
														</label>
													</section>
												</div>
											</form>
										</div>
										<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
											<button class="btn btn-labeled btn-primary" type="button" id="btnNew" onclick="#">
												<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
												Agregar
											</button>
											<button class="btn btn-labeled btn-success" type="button" id="btnNew" onclick="#">
												<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>
												Modificar
											</button>									
										</div>
									</div>
									<div class="table-responsive">
										<table id="tbl5" class="table table-hover table-striped" width="100%">
											<thead>
												<tr>
													<th data-class="expand">Id</th>
													<th data-hide="phone">Descuento #1</th>
													<th data-hide="phone">Descuento #2</th>
													<th data-hide="phone">Descuento #3</th>
													<th data-hide="phone">Descuento #4</th>
												</tr>
											</thead>
										</table>
									</div>
								</div> -->
								<!-- <div class="step-pane" id="step5">
									<form action="#" id="frmEstaciones" method="POST" class="smart-form">
										<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
										<fieldset>
											<div class="row">
												<section class="col col-4">
													<label class="label"># Cliente</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Nombre del cliente</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">RFC</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Representante del cliente</label>
													<label class="select">
														<select class="input-sm" name="estatus" id="estatus">
															<option value="1">Seleccione representante</option>
														</select> <i></i> </label>
												</section>																																			
												<section class="col col-4">
													<label class="label">Usuario</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>
												<section class="col col-4">
													<label class="label">Clave</label>
													<label class="input">
														<input type="text" class="input-sm" name="nombre" id="nombre">
													</label>
												</section>												
											</div>							
										</fieldset>														
										<footer>
											<button type="button" id="btnAdd" class="btn btn-primary">
												Agregar
											</button>
											<button type="button" id="btnCancel" class="btn btn-default" onclick="window.history.back();">
												Cancelar
											</button>
										</footer>
									</form>
								</div> -->
							</div>
						</div>						
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
<script src="assets/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		$('#tbl1').dataTable();
		$('#tbl2').dataTable();
		$('#tbl3').dataTable();
		$('#tbl4').dataTable();
		$('#tbl5').dataTable();

		var wizard = $('.wizard').wizard();
		wizard.on('change' , function(e, info){
			if(info.step == 1 ) {		  		  		
			    return true; 		
			}			    			    
		}).on('finished', function (e, data) {
			alert('Funcion por terminar');
			//$("#formHistorialMedico").submit();
		}).on('stepclick', function(e){
		return false;
		});


		_g.listas.getEmpresas();
		$('#id_sucursal').select2();
		$("#id_empresa").change(function(event) {
			_g.listas.getEmpresasSucursales();
		});
		$("#frmProveedores").validate({
			rules:{
				id_sucursal : {
					required : true
				},
				nombre : {
					required : true
				},
				rfc : {
					required : true
				},
				fecha_alta : {
					required : true
				},
				nombre_corto : {
					required : true
				},
				ranking : {
					required : true
				},
				id_cuenta_contable : {
					required : true
				},
				calle : {
					required : true
				},
				num_exterior : {
					required : true
				},
				num_interior : {
					required : true
				},
				colonia : {
					required : true
				},
				codigo_postal : {
					required : true
				},
				ciudad_municipio : {
					required : true
				},
				estado : {
					required : true
				},
				pais : {
					required : true
				}
			},
			messages : {
				id_sucursal : {
					required : "Es obligatorio llenar los datos",
				},
				nombre : {
					required : "Es obligatorio llenar los datos",
				},
				rfc : {
					required : "Es obligatorio llenar los datos",
				},
				fecha_alta : {
					required : "Es obligatorio llenar los datos",
				},
				nombre_corto : {
					required : "Es obligatorio llenar los datos",
				},
				ranking : {
					required : "Es obligatorio llenar los datos",
				},
				id_cuenta_contable : {
					required : "Es obligatorio llenar los datos",
				},
				calle : {
					required : "Es obligatorio llenar los datos",
				},
				num_exterior : {
					required : "Es obligatorio llenar los datos",
				},
				num_interior : {
					required : "Es obligatorio llenar los datos",
				},
				colonia : {
					required : "Es obligatorio llenar los datos",
				},
				codigo_postal : {
					required : "Es obligatorio llenar los datos",
				},
				ciudad_municipio : {
					required : "Es obligatorio llenar los datos",
				},
				estado : {
					required : "Es obligatorio llenar los datos",
				},
				pais : {
					required : "Es obligatorio llenar los datos",
				}				
			},
			submitHandler : function(form) {
			    form.submit();
			}
		});
	};
	pagefunction();
</script>


