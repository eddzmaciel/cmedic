<?php

/*
|--------------------------------------------------------------------------
| Rutas rol Inventario ---- APIREST
| Nredbugs 2015
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'empresas_usuarios','middleware' => ['auth', 'roles'],'roles' => ['Empresas_usuarios']], function(){
	Route::get('inicio', function()
	{
		return View::make('app.administrador_eu.dashboard');
	});
	Route::group(['prefix' => 'empresas'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_eu.empresas.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_eu.empresas.create');
		});
	});
	Route::group(['prefix' => 'sucursales'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_eu.sucursal.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_eu.sucursal.create');
		});
	});
	Route::group(['prefix' => 'centro_costos'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_eu.centro_costos.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_eu.centro_costos.create');
		});
	});
	Route::group(['prefix' => 'sucursal_almacenes'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_eu.sucursal_almacenes.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_eu.sucursal_almacenes.create');
		});
	});
	Route::group(['prefix' => 'bancos_empresas'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_eu.bancos_empresas.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_eu.bancos_empresas.create');
		});
	});
	Route::group(['prefix' => 'contabilidad_automatica'], function(){
		Route::get('/', function(){
			return View::make('app.administrador_eu.contabilidad_automatica.index');
		});
		Route::get('nuevo', function(){
			return View::make('app.administrador_eu.contabilidad_automatica.create');
		});
	});
	Route::get('almacenes', function()
	{
		return View::make('app.administrador_eu.mockups.almacenes');
	});
	Route::get('bancos', function()
	{
		return View::make('app.administrador_eu.mockups.bancos');
	});
	Route::get('facturacion_electronica', function()
	{
		return View::make('app.administrador_eu.mockups.facturacion_electronica');
	});
	Route::get('contabilidad', function()
	{
		return View::make('app.administrador_eu.mockups.contabilidad');
	});
	Route::get('contabilidad_productos', function()
	{
		return View::make('app.administrador_eu.mockups.contabilidad_productos');
	});
	Route::get('nomina', function()
	{
		return View::make('app.administrador_eu.mockups.nomina');
	});
	Route::get('nueva_retencion', function()
	{
		return View::make('app.administrador_eu.mockups.nueva_retencion');
	});
});