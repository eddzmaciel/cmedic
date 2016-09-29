<aside id="left-panel">
	<div class="login-info">
		<span>			
			<a href="#/admin/usuarios/perfil">
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
				<a href="contabilidad/inicio" title="Inicio"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inicio</span></a>
			</li>
			<li class="">
				<a href="contabilidad/pacientes" title="pacientes"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">Pacientes</span></a>
			</li>

			<li class="">
				<a href="contabilidad/med" title="medicos"><i class="fa fa-lg fa-fw fa-user-md"></i> <span class="menu-item-parent">Medicos</span></a>
			</li>
			<li class="">
				<a href="contabilidad/citas" title="pacientes"><i class="fa fa-lg fa-fw fa-th-list"></i> <span class="menu-item-parent">Citas</span></a>
			</li>

			<li class="">
				<a href="contabilidad/notas" title="recetas"><i class="fa fa-lg fa-fw fa-medkit"></i> <span class="menu-item-parent">Recetas</span></a>
			</li>

		</ul>
		</ul>
	</nav>
	<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
</aside>