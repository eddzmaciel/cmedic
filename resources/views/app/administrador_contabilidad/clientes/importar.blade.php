<div class="jarviswidget jarviswidget-sortable" id="wid-id-11" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" role="widget">
	<header role="heading">
		<h2><strong>Importacion Clientes</strong></h2>	
		<ul id="widget-tab-1" class="nav nav-tabs pull-right">
			<li class="active">
				<a data-toggle="tab" href="#hr1" aria-expanded="true"> <i class="fa fa-lg fa-arrow-circle-o-down"></i> <span class="hidden-mobile hidden-tablet"> Importar cuenta </span> </a>
			</li>			
		</ul>	
	<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
	<div role="content">
		<div class="jarviswidget-editbox">
		</div>
		<div class="widget-body no-padding">
			<div class="tab-content">
				<div class="tab-pane fade active in" id="hr1">
					<form action="upload.php" class="dropzone dz-clickable" id="mydropzone"><div class="dz-default dz-message"><span>Seleccione los archivos XML<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Arrastre <span class="font-xs">o seleccione los xml</span></span><span>&nbsp;&nbsp;<h4 class="display-inline"> (Click)</h4></span></span></span></span></div></form>
					<div class="row" style="margin: 0;">
						<form action="#" id="frmEstaciones" method="POST" class="smart-form">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
							<fieldset>
								<div class="row">
									<section class="col col-4">
										<label class="label"># Email</label>
										<label class="input">
											<input type="text" class="input-sm" name="nombre" id="nombre">
										</label>
									</section>
									<section class="col col-4">
										<label class="label">Banco</label>
										<label class="select">
											<select class="input-sm" name="estatus" id="estatus">
												<option value="1">Seleccione banco</option>
											</select> <i></i> </label>
									</section>
									<section class="col col-4">
										<label class="label">Moneda</label>
										<label class="select">
											<select class="input-sm" name="estatus" id="estatus">
												<option value="1">Seleccione moneda</option>
											</select> <i></i> </label>
									</section>
									<section class="col col-3">
										<label class="label"># de Cuenta</label>
										<label class="input">
											<input type="text" class="input-sm" name="nombre" id="nombre">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Dias de credito</label>
										<label class="input">
											<input type="text" class="input-sm" name="nombre" id="nombre">
										</label>
									</section>																																			
									<section class="col col-3">
										<label class="label">Contacto</label>
										<label class="input">
											<input type="text" class="input-sm" name="nombre" id="nombre">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Puesto</label>
										<label class="input">
											<input type="text" class="input-sm" name="nombre" id="nombre">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Telefono</label>
										<label class="input">
											<input type="text" class="input-sm" name="nombre" id="nombre">
										</label>
									</section>
									<section class="col col-3">
										<label class="label">Ext</label>
										<label class="input">
											<input type="text" class="input-sm" name="nombre" id="nombre">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Email</label>
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
					</div>
					<div class="table-responsive">
						<table id="tbl1" class="table table-hover table-striped" width="100%">
							<thead>
								<tr>
									<th data-class="expand">Id</th>
									<th data-hide="phone">Nombre de Cliente</th>
									<th data-hide="phone">PF/PM</th>
									<th data-hide="phone">RFC</th>
									<th data-hide="phone">Calle</th>
									<th data-hide="phone"># Int</th>									
									<th data-hide="phone"># Ext</th>									
									<th data-hide="phone">Colonia</th>									
									<th data-hide="phone">CP</th>									
									<th data-hide="phone">Ciudad</th>									
									<th data-hide="phone">Estado</th>									
									<th data-hide="phone">Pais</th>									
								</tr>
							</thead>
						</table>
					</div>
				</div>				
			</div>					
		</div>		
	</div>
	
</div>
<script type="text/javascript" src="/assets/js/plugin/dropzone/dropzone.min.js"></script>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		$('#tbl1').dataTable();
		Dropzone.autoDiscover = false;
		$("#mydropzone").dropzone({
			//url: "/file/post",
			addRemoveLinks : true,
			maxFilesize: 0.5,
			dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
			dictResponseError: 'Error uploading file!'
		});
	};
	pagefunction();
</script>


