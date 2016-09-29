<header id="header">
	<div id="logo-group">
		<span id="logo"> <img src="/img/logo_title.png" alt="360Contadores" style=""> </span>
		<!-- <span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>
		<div class="ajax-dropdown">
			<div class="btn-group btn-group-justified" data-toggle="buttons">
				<label class="btn btn-default">
					<input type="radio" name="activity" id="/ajax/notify/mail.html">
					SSA (14) </label>
				<label class="btn btn-default">
					<input type="radio" name="activity" id="/ajax/notify/notifications.html">
					MAES (3) </label>
				<label class="btn btn-default">
					<input type="radio" name="activity" id="/ajax/notify/tasks.html">
					BSH (4) </label>
			</div>
			<div class="ajax-notifications custom-scroll">
				<div class="alert alert-transparent">
					<h4>Por el momento usten no contiene notificaciones</h4>
					Estas le llegaran automaticamente y en algunos casos se le notificara vía email.
				</div>
				<i class="fa fa-lock fa-4x fa-border"></i>
			</div>
			<span> Ultima fecha de revision: 9/10/2014 5:43PM
				<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
					<i class="fa fa-refresh"></i>
				</button>
			</span>
		</div> -->
	</div>
	<!-- <div class="project-context hidden-xs">
		<span class="label">Notas y Recordatorios:</span>
		<span class="project-selector dropdown-toggle" data-toggle="dropdown">Listado Actividades <i class="fa fa-angle-down"></i></span>
		<ul class="dropdown-menu">
			<li>
				<a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
			</li>
			<li>
				<a href="javascript:void(0);">Notes on pipeline upgradee</a>
			</li>
			<li>
				<a href="javascript:void(0);">Assesment Report for merchant account</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Borrar</a>
			</li>
		</ul>
	</div> -->
	<div class="pull-right">
		<div  class="btn-header transparent pull-right">
			<span> <a href="/auth/logout" title="Cerrar Sesion" data-action="userLogout" data-logout-msg="Esta usted seguro que desea salir de la plataforma"><i class="fa fa-sign-out"></i></a> </span>
		</div>
		<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
			<li class="">
				<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
					<img src="/uploads/avatares/{{Auth::user()->avatar}}" alt="Hugo Chanocua" class="online" style="width: 30px;height: 30px;"/>  
				</a>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="#/admin/usuarios/perfil"> <i class="fa fa-user"></i> Perfil</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-action="resetWidgets"><i class="fa fa-refresh"></i> Reiniciar Aplicacion</a>
					</li>
				</ul>
			</li>
		</ul>
		<div id="hide-menu" class="btn-header pull-right">
			<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
		</div>
		<div class="btn-header transparent pull-right">
			<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
		</div>
		<div  class="btn-header transparent pull-right">
			<span> <a href="/360" title="Menu" ><i class="fa fa-home"></i></a> </span>
		</div>
		<!-- <div id="hide-menu" class="btn-header pull-right">
			<span> <a href="javascript:void(0);" data-action="toggleShortcut" title="Open Shortcuts" class="nav-apps"><i class="fa fa-reorder"></i> M&oacute;dulos</a></span>
		</div> -->
	</div>
</header>
<!-- END HEADER -->