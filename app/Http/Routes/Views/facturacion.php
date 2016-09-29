<?php

/*
|--------------------------------------------------------------------------
| Rutas rol Inventario ---- APIREST
| Nredbugs 2015
|--------------------------------------------------------------------------
*/
	Route::group(['prefix' => 'facturacion','middleware' => ['auth', 'roles'],'roles' => ['administrador']], function(){
		Route::get('inicio', function()
		{
			return View::make('app.administrador_facturacion.dashboard');
		});
		Route::group(['prefix' => 'clientes'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.clientes.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.clientes.create');
			});
			Route::get('importacion', function(){
				return View::make('app.administrador_facturacion.clientes.importar');
			});
		});

			Route::group(['prefix' => 'productos'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.productos.index');
			});
			Route::get('listado_productos', function(){
				return View::make('app.administrador_facturacion.productos.secciones.listado_productos');
			});
		});

		Route::group(['prefix' => 'sucursales'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.sucursal.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.sucursal.create');
			});
		});
		Route::group(['prefix' => 'cliente_comercial'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.cliente_comercial.create');
			});
		});
		Route::group(['prefix' => 'xml'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.xml.create');
			});
		});
		Route::group(['prefix' => 'cuentas'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.cuentas.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.cuentas.create');
			});
			Route::get('importacion', function(){
				return View::make('app.administrador_facturacion.cuentas.importar');
			});
		});
		Route::group(['prefix' => 'servicios'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.servicios.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.servicios.create');
			});
		});
		Route::group(['prefix' => 'unidad_transporte'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.unidad_transporte.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.unidad_transporte.create');
			});
		});
		Route::group(['prefix' => 'anticipos'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.anticipos.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.anticipos.create');
			});
			Route::get('aplicar', function(){
				return View::make('app.administrador_facturacion.anticipos.aplicar');
			});
		});
		Route::group(['prefix' => 'facturas'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.facturas.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.facturas.create');
			});
			Route::get('pago', function(){
				return View::make('app.administrador_facturacion.facturas.pago');
			});
			Route::get('carta_porte', function(){
				return View::make('app.administrador_facturacion.facturas.carta_porte');
			});
			Route::get('nota_credito', function(){
				return View::make('app.administrador_facturacion.facturas.nota_credito');
			});
			Route::get('arrendamiento', function(){
				return View::make('app.administrador_facturacion.facturas.arrendamiento');
			});
			Route::get('recibo_honorarios', function(){
				return View::make('app.administrador_facturacion.facturas.rh');
			});
			Route::get('ticket', function(){
				return View::make('app.administrador_facturacion.facturas.ticket');
			});
		});
		Route::group(['prefix' => 'inmueble'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.inmuebles.index');
			});
			Route::get('nuevo', function(){
				return View::make('app.administrador_facturacion.inmuebles.create');
			});
		});
		Route::group(['prefix' => 'asignacion_atributos'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.asignaciones.atributos');
			});		
		});
		Route::group(['prefix' => 'asignacion_cuentas'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.asignaciones.cuentas');
			});		
		});
		Route::group(['prefix' => 'asignacion_scostos'], function(){
			Route::get('/', function(){
				return View::make('app.administrador_facturacion.asignaciones.scostos');
			});		
		});
		// Route::group(['prefix' => 'pedidos'], function(){
		// 	Route::get('/', function(){
		// 		return View::make('app.administrador_facturacion.entradas.pedidos.index');
		// 	});
		// });
		// Route::group(['prefix' => 'salidas'], function(){
		// 	Route::get('/', function(){
		// 		return View::make('app.administrador_facturacion.salidas.index');
		// 	});
		// });
		// Route::group(['prefix' => 'facturacion'], function(){
		// 	Route::get('/', function(){
		// 		return View::make('app.administrador_facturacion.almacen.facturacion.index');
		// 	});
		// });
		// Route::group(['prefix' => 'reportes'], function(){
		// 	Route::get('/', function(){
		// 		return View::make('app.administrador_inventario.reportes.index');
		// 	});
		// });
		// Route::group(['prefix' => 'proveedores'], function(){
		// 	Route::get('/', function(){
		// 		return View::make('app.administrador_inventario.catalogos.proveedores.index');
		// 	});
		// });
	});