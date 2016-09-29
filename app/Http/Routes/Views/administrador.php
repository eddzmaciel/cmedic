<?php

/*
|--------------------------------------------------------------------------
| Rutas rol Administrador ---- APIREST
| Nredbugs 2015
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin','middleware' => ['auth', 'roles'],'roles' => ['administrador']], function(){
	Route::get('inicio', function()
	{
		return View::make('app.administrador.dashboard');
	});
	Route::group(['prefix' => 'usuarios'], function(){
		Route::get('/', function(){
			return View::make('app.administrador.usuarios.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador.usuarios.create');
		});
		Route::get('perfil', function(){
			return View::make('app.administrador.perfil.index');
		});
		Route::get('editar/{id}','Admin\UserController@edit');	
	});
});