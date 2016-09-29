<?php

/*
|--------------------------------------------------------------------------
| Rutas rol Administrador ---- APIREST
| Nredbugs 2015
|--------------------------------------------------------------------------
*/
use App\Http\Requests;


Route::group(['prefix' => 'api_med','namespace' => 'Medical','middleware' => ['auth', 'roles'],'roles' => ['administrador']], function(){



    /*    webservices routes*/
    Route::get('mail','PruebasController@EnvioCorreo');
    /* // webservices routes*/


    Route::get('info_notas/{id}','NotasController@info');
    Route::get('info_citas/{id}','CitasController@info');
    
    Route::get('info_medicos/{id}','MedicosController@info');
	Route::get('info_pacientes/{id}','PacientesController@info');
	Route::resource('pacientes','PacientesController');
    Route::resource('medicos','MedicosController');
    Route::resource('citas','CitasController');
    Route::resource('notas','NotasController');


/*  Route::resource('recipes','RecipesController');
	Route::resource('bancos','BancosController');
	Route::resource('empleados','EmpleadosController');
	Route::resource('clientes','ClientesController');
	Route::resource('empresas','EmpresasController');
	Route::resource('proveedores','ProveedoresController');
	Route::resource('productos','ProductosController');*/
	/* Contador de empresas, sucursales, centros de costo, subcentros, almacenes y cuentas de banco en el sistema 
	Route::get('contador_empresas', function(){
        $empresas = \DB::table('360_empresas')->count();
        $sucursales = \DB::table('360_sucursales')->count();
        $cc = \DB::table('360_centro_costos')->count();
        $almacenes = \DB::table('360_sucursal_almacenes')->count();
        $cuentas_banco = \DB::table('360_bancos_empresas')->count();
        $data = array(
        	"empresas" => $empresas,
        	"sucursales" => $sucursales,
        	"cc" => $cc,
        	"almacenes" => $almacenes,
        	"cuentas_banco" => $cuentas_banco,
       	);
        return response()->json($data,200);
    });*/
	/* Contador de empelados y cuentas de banco en el sistema 
    Route::get('contador_empleados', function(){
        $empleados = \DB::table('360_empleados')->count();
        $cuentas_banco = \DB::table('360_empleados_cuentas')->count();
        $data = array(
        	"empleados" => $empleados,
        	"cuentas_banco" => $cuentas_banco,
       	);
        return response()->json($data,200);
    });*/

	/* Contador clientes y cuentas clientes
    Route::get('contador_clientes', function(){
        $clientes = \DB::table('360_clientes')->count();
        $cuentas_clientes = \DB::table('360_clientes_cuentas')->count();
        $data = array(
        	"clientes" => $clientes,
        	"cuentas_clientes" => $cuentas_clientes,
       	);
        return response()->json($data,200);
    });

    
	Route::get('archivos_xml_error/{id}', function($id){
        $query = ArchivosXMLError::where('id_empresa',$id)->orderBy('id', 'desc')->get();
        return response()->json($query,200);
    });
*/

});     