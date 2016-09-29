<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ProveedoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_proveedores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->integer('id_sucursal')->default(0);
			$table->string('nombre')->nullable();
			$table->string('rfc')->unique();
			$table->string('curp')->nullable();
			$table->date('fecha_alta')->nullable();
			$table->string('nombre_corto')->nullable();
			$table->string('proveedor_extranjero')->nullable();
			$table->string('ranking')->nullable();
			$table->string('telefono')->nullable();
			$table->string('zip_code')->nullable();
			$table->string('calle')->nullable();
			$table->string('num_interior')->nullable();
			$table->string('num_exterior')->nullable();
			$table->string('colonia')->nullable();
			$table->string('codigo_postal')->nullable();
			$table->string('piso')->nullable();
			$table->string('ciudad_municipio')->nullable();
			$table->string('estado')->nullable();
			$table->string('pais')->nullable();
			$table->string('email_uno')->nullable();
			$table->string('email_dos')->nullable();
			$table->string('sitio_web')->nullable();
			$table->integer('estatus')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('360_proveedores');
	}

}
