<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_clientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->integer('id_sucursal')->default(0);
			$table->string('nombre')->nullable();
			$table->string('rfc')->nullable();
			$table->date('fecha_alta')->nullable();
			$table->string('nombre_corto')->nullable();
			$table->string('ranking')->nullable();
			$table->integer('id_cuenta_contable')->nullable();
			$table->string('calle')->nullable();
			$table->string('num_exterior')->nullable();
			$table->string('num_interior')->nullable();
			$table->string('colonia')->nullable();
			$table->string('codigo_postal')->nullable();
			$table->string('ciudad_municipio')->nullable();
			$table->string('estado')->nullable();
			$table->string('pais')->nullable();
			$table->string('telefono')->nullable();
			$table->string('tax-id')->nullable();
			$table->string('email_uno')->nullable();
			$table->string('email_dos')->nullable();
			$table->string('email_tres')->nullable();
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
		Schema::dropIfExists('360_clientes');
	}

}
