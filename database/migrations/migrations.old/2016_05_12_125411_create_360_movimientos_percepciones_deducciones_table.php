<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360MovimientosPercepcionesDeduccionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_movimientos_percepciones_deducciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_poliza');
			$table->integer('id_nomina_percepcion_deduccion');
			$table->integer('id_cuenta_contable');
			$table->double('debe',15,4)->default(0);
			$table->double('haber',15,4)->default(0);
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
		Schema::dropIfExists('360_movimientos_percepciones_deducciones');
	}

}
