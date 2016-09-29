<?php

/*
|--------------------------------------------------------------------------
| Rutas rol Inventario ---- APIREST
| Nredbugs 2015
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'contabilidad','middleware' => ['auth', 'roles'],'roles' => ['administrador']], function(){
	Route::get('inicio', function()
	{
		return View::make('app.administrador_contabilidad.dashboard');
	});



	Route::group(['prefix' => 'notas'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_contabilidad.notas.index');
			});	
		});

	Route::group(['prefix' => 'med'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_contabilidad.med.index');
			});	
		});
Route::group(['prefix' => 'citas'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_contabilidad.citas.index');
			});	
		});



	Route::group(['prefix' => 'pacientes'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_contabilidad.pacientes.index');
			});	
		});

	Route::group(['prefix' => 'empresas'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_contabilidad.empresas.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_contabilidad.empresas.create');
		});		
	});
	Route::group(['prefix' => 'clientes'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_contabilidad.clientes.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_contabilidad.clientes.create');
		});		

		Route::get('m_clientes', function(){
			return View::make('app.administrador_contabilidad.clientes.m_clientes');
		});	
	});
	Route::group(['prefix' => 'proveedores'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_contabilidad.proveedores.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_contabilidad.proveedores.create');
		});		
	});
	Route::group(['prefix' => 'empleados'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_contabilidad.empleados.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_contabilidad.empleados.create');
		});		
	});


	
});