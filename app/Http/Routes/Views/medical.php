<?php

/*
___________________
 
 RUTAS CMEDIC
 __________________
*/
Route::group(['prefix' => 'medical','middleware' => ['auth', 'roles'],'roles' => ['administrador']], function(){
	Route::get('inicio', function()
	{
		return View::make('app.administrador_medico.dashboard');
	});
	Route::group(['prefix' => 'notas'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_medico.notas.index');
			});	
		});
	Route::group(['prefix' => 'med'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_medico.med.index');
			});	
		});
	Route::group(['prefix' => 'citas'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_medico.citas.index');
			});	
		});
	Route::group(['prefix' => 'pacientes'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_medico.pacientes.index');
			});	
		});
});