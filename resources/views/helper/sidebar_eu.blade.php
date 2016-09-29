<aside id="left-panel">
	<div class="login-info">
		<span>			
			<a href="#empresas_usuarios/usuarios/perfil">
				<img src="/uploads/avatares/{{Auth::user()->avatar}}" alt="me" class="online" style="width: 25px;height: 25px;"/> 
				<span>
					{{Auth::user()->name}}
				</span>
			</a> 			
		</span>
	</div>
	<nav>
		<ul>
			<li class="">
				<a href="empresas_usuarios/inicio" title="Inicio"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inicio</span></a>
			</li>	
			<li class="">
				<a href="empresas_usuarios/empresas" title="Inicio"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Empresas</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/sucursales" title="Inicio"><i class="fa fa-lg fa-fw fa-cubes"></i> <span class="menu-item-parent">Sucursales</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/centro_costos" title="Inicio"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Centro de costos</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/sucursal_almacenes" title="Inicio"><i class="fa fa-lg fa-fw fa-database"></i> <span class="menu-item-parent">Almacenes</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/bancos_empresas" title="Inicio"><i class="fa fa-lg fa-fw fa-bank"></i> <span class="menu-item-parent">Bancos</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/facturacion_electronica" title="Inicio"><i class="fa fa-lg fa-fw fa-list"></i> <span class="menu-item-parent">Facturacion electronica</span></a>
			</li>	
			<li class="">
				<a href="empresas_usuarios/contabilidad_automatica" title="Inicio"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Contabilidad Aut.</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/contabilidad_productos" title="Inicio"><i class="fa fa-lg fa-fw fa-archive"></i> <span class="menu-item-parent">Contabilidad productos</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/nomina" title="Inicio"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Nomina</span></a>
			</li>
			<li class="">
				<a href="empresas_usuarios/nueva_retencion" title="Inicio"><i class="fa fa-lg fa-fw fa-list"></i> <span class="menu-item-parent">Nueva Retencion</span></a>
			</li>						
		</ul>
	</nav>
	<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
</aside>