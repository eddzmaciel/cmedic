<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360InmuebleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_inmueble', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion')->nullable();
			$table->integer('id_cuenta_contable')->nullable();
			$table->string('predial')->nullable();
			$table->string('valor_catastral')->nullable();
			$table->string('calle')->nullable();
			$table->string('numero')->nullable();
			$table->string('colonia')->nullable();
			$table->string('ciudad')->nullable();
			$table->string('estado')->nullable();
			$table->string('codigo_postal')->nullable();
			$table->string('estatus')->nullable();
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
		Schema::dropIfExists('360_inmueble');
	}

}
