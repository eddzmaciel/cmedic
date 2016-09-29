<?php

/*
|--------------------------------------------------------------------------
| Rutas rol Administrador ---- APIREST
| Nredbugs 2015
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'api_admin','namespace' => 'Admin','middleware' => ['auth', 'roles'],'roles' => ['administrador'] ], function(){
	Route::resource('usuarios','UserController');
	Route::post('modificacion_base','UserController@postModificarBase');
	Route::post('modificacion_avatar','UserController@postModificarAvatar');
});