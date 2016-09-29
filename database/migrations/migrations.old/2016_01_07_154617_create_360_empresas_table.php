<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360EmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_empresas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre')->nullable();
			$table->string('rfc')->nullable();
			$table->string('calle')->nullable();
			$table->string('num_interior')->nullable();
			$table->string('num_exterior')->nullable();
			$table->string('colonia')->nullable();
			$table->string('codigo_postal')->nullable();
			$table->string('piso')->nullable();
			$table->string('ciudad_municipio')->nullable();
			$table->string('estado')->nullable();
			$table->string('telefono')->nullable();
			$table->string('pais')->nullable();
			$table->string('email_uno')->nullable();
			$table->string('email_dos')->nullable();
			$table->string('sitio_web')->nullable();
			$table->string('gravados_excentos')->nullable();
			$table->string('multicuentas')->nullable();
			$table->string('logo_empresa')->nullable();
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
		Schema::dropIfExists('360_empresas');
	}

}
