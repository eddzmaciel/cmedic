<?php


Route::group(['prefix' => 'api_medico','namespace' => 'medic','middleware' => ['auth', 'roles'],'roles' => ['Administrador','Administrador_Inventario'] ], function(){
	Route::resource('citas','CitasController');
	Route::resource('doctores','DoctoresController');
	Route::resource('pacientes','PacientesController');
	Route::resource('recetas','RecetasController');
	
});     