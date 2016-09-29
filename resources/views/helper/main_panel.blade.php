<div id="main" role="main">
	<div id="ribbon">
		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
				<i class="fa fa-refresh"></i>
			</span> 
		</span>
		<ol class="breadcrumb">
			<li>Inicio</li>
		</ol>
	</div>
	@if (Session::has('success'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<strong>{{ Session::get('success') }}</strong><br><br>
		</div>
	@elseif ( Session::has( 'warning' ))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<strong>{{ Session::get('warning') }}</strong><br><br>
		</div>
	@endif
	<!-- end breadcrumb -->
	@if (Auth::user()->role_id == 6 || Auth::user()->role_id == 5)
		<div id="content" style="padding:0px;">
		</div>
	@else
		<div id="content">		
		</div>
	@endif
	<!-- END #MAIN CONTENT -->
</div>
<!-- END #MAIN PANEL -->