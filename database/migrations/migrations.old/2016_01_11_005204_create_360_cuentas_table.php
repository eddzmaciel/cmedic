<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CuentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cuentas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_sucursal');			
			$table->string('cuenta')->nullable();
			$table->string('descripcion')->nullable();
			$table->string('lengua_extranjera')->nullable();
			$table->string('idioma')->nullable();
			$table->string('tipo_cuenta')->nullable();
			$table->string('nivel_cuenta')->nullable();
			$table->string('codigo_agrupador')->nullable();
			$table->string('digito_anual')->nullable();
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
		Schema::dropIfExists('360_cuentas');
	}

}
