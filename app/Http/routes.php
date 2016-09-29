<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*RUTA DE PRUEBA*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);	

Route::group(['middleware' => ['auth']], function(){
	Route::get('/', 'HomeController@index');
	//Route::get('/app_fe', 'HomeController@facturacion');
	Route::get('360', 'HomeController@menu');
});

Route::group(['prefix' => 'webs' ], function(){
	Route::get('mail','PruebasController@EnvioCorreo');
	Route::get('multi','PruebasController@multiplicacion');
	Route::get('demo2','SoapController@demo');
	Route::get('w1', 'PruebasController@getIndex');
	Route::get('w2','PruebasController@ws2');
	Route::get('w3','PruebasController@ws3');
	Route::get('w4','PruebasController@ws4');
	Route::get('w5','PruebasController@ws5');
	Route::get('w6','PruebasController@ws6');;
	Route::get('prueba2', function(){
		return ((FLOAT)(round(0.1, 4))*((FLOAT)round(888.89, 4)))* (FLOAT)1;
	});
});

/*RUTAS INCLUIDAS VISTAS, CONTROLADORES*/
include('Routes/Views/administrador.php');
include('Routes/App/administrador.php');
include('Routes/Views/medical.php');
include('Routes/App/medical.php');