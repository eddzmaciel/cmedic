<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360SucursalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_sucursales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->string('nombre')->nullable();
			$table->string('nombre_corto')->nullable();
			$table->string('calle')->nullable();
			$table->string('num_interior')->nullable();
			$table->string('num_exterior')->nullable();
			$table->string('colonia')->nullable();
			$table->string('codigo_postal')->nullable();
			$table->string('piso')->nullable();
			$table->string('ciudad_municipio')->nullable();
			$table->string('estado')->nullable();
			$table->string('pais')->nullable();
			$table->string('contacto')->nullable();
			$table->string('puesto')->nullable();;
			$table->string('telefono')->nullable();
			$table->string('email')->nullable();
			$table->integer('status')->default(1);
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
		Schema::dropIfExists('360_sucursales');
	}

}
