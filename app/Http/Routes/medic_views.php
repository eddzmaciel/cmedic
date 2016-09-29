<?php


Route::group(['prefix' => 'medico','middleware' => ['auth', 'roles'],'roles' => ['administrador']], function(){
		Route::get('/', function()
		{
			return View::make('medico.index');
		});
		Route::get('inicio', function()
		{
			return View::make('app.administrador_medico.dashboard');
		});
		
			Route::group(['prefix' => 'pacientes'], function(){
					Route::get('/', function(){
						return View::make('app.administrador_medico.pacientes.index');
					});

					Route::get('nuevo', function(){
						return View::make('app.administrador_inventario.productos.create');
					});
			});
	
		
});