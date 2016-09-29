<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Administrador 
			<span>> 
				Estaciones
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
			<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Formulario </h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						{!! Form::model($obj,['id' => 'frmEstaciones','class'=>'smart-form','method' => 'PATCH','route'=>['api_admin.estaciones.update',$obj->id]]) !!}
							{!! Form::token() !!}
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="label">Identificador Estacion</label>
										<label class="input">
											{!! Form::text('nombre',null,['class'=>'input-sm']) !!} 
										</label>
									</section>
									<section class="col col-6">
										<label class="label">Estatus</label>
										<label class="select">
											{!! Form::select('estatus', array('1' => 'Disponible','2' => 'Mantenimiento','3' => 'Fuera de Servicio'), array('class' => 'input-sm')) !!}
						    				<i></i> </label>
									</section>									
								</div>								
							</fieldset>																				
							<footer>
								<button type="submit" id="btnAdd" class="btn btn-primary">
									Guardar
								</button>
								<button type="button" id="btnCancel" class="btn btn-default" onclick="window.history.back();">
									Cancelar
								</button>
							</footer>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
<script type="text/javascript">
	pageSetUp();
	var pagefunction = function() {
		$("#frmEstaciones").validate({
			rules:{
				nombre :{
					required : true,
					min: 1
				},
				estatus :{
					required : true
				}
			},
			messages : {
				nombre :{
					required : "Es obligatorio llenar los datos",
				},
				estatus :{
					required : "Es obligatorio llenar los datos",
				}	
			},
			submitHandler : function(form) {
			    form.submit();
			}
		});
	};
</script>


