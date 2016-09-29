<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360InconsistenciasMetodoPagoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_inconsistencias_metodo_pago', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('metodo_pago')->nullable();
			$table->integer('id_metodo_pago');
			$table->integer('id_empresa');
			$table->integer('id_sucursal');
			$table->integer('id_cc');
			$table->integer('id_scc');
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
		Schema::dropIfExists('360_inconsistencias_metodo_pago');
	}

}
