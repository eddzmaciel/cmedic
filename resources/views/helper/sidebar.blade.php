<aside id="left-panel">
	<div class="login-info">
		<span>			
			<a href="#admin/usuarios/perfil">
				<img src="/uploads/avatares/{{Auth::user()->avatar}}" alt="me" class="online" style="width: 25px;height: 25px;"/> 
				<span>
					{{Auth::user()->name}}
				</span>
			</a> 			
		</span>
	</div>
	<nav>
		<ul>
			<!-- <li class="">
				<a href="admin/inicio" title="X"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inicio</span></a>
			</li> -->
			<li class="">
				<a href="admin/control_citas" title="X"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Control de citas</span></a>
			</li>
			<li class="">
				<a href="admin/control_sesiones" title="X"><i class="fa fa-lg fa-fw fa-stethoscope"></i> <span class="menu-item-parent">Control de sesiones</span></a>
			</li>
			<!-- <li class="">
				<a href="admin/control_citas/agenda" title="X"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">Agenda</span></a>
			</li> -->
<!-- 			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-book"></i><span class="menu-item-parent">Control de citas</span></a>
				<ul>
					<li>
						<a href="admin/control_citas">Consulta</a>
					</li>
					<li>
						<a href="admin/control_citas/agenda">Agenda</a>
					</li>					
				</ul>
			</li> -->
			<!-- <li class="">
				<a href="admin/cierre" title="X"><i class="fa fa-lg fa-fw fa-download"></i> <span class="menu-item-parent">Cierre de caja</span></a>
			</li> -->
			<li class="">
				<a href="admin/pagos" title="X"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Pagos</span></a>
			</li>
			<!-- <li>
				<a href="#"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Pagos</span></a>
				<ul>
					<li>
						<a href="admin/pagos_regulares">Regulares</a>
					</li>
					<li>
						<a href="admin/pagos_beneficiencia">Beneficiencias</a>
					</li>					
				</ul>
			</li> -->
			<li class="">
				<a href="admin/empresas_beneficiencia" title="X"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Beneficiencias</span></a>
			</li>
			<!-- <li>
				<a href="#"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Beneficiencias</span></a>
				<ul>
					<li>
						<a href="admin/empresas_beneficiencia/nuevo">Agregar</a>
					</li>
					<li>
						<a href="admin/empresas_beneficiencia">Listado</a>
					</li>
					<li>
						<a href="admin/asignacion_de_sesiones/nuevo">Asignar</a>
					</li>					
					<li>
						<a href="admin/asignacion_de_sesiones">Control Sesiones</a>
					</li>
				</ul>
			</li> -->
			<li class="">
				<a href="admin/pacientes" title="X"><i class="fa fa-lg fa-fw fa-user-md"></i> <span class="menu-item-parent">Pacientes</span></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-list"></i> <span class="menu-item-parent">Catalogos</span></a>
				<ul>
					<li>
						<a href="admin/usuarios">Usuarios</a>
					</li>
					<li>
						<a href="admin/citas">Citas</a>
					</li>
					<li>
						<a href="admin/estaciones">Estaciones</a>
					</li>
					@if(Auth::user()->role_id == 1)
					<li>
						<a href="admin/sucursales">Sucursales</a>
					</li>
					@endif					
				</ul>
			</li>
		</ul>
	</nav>
	<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
</aside>