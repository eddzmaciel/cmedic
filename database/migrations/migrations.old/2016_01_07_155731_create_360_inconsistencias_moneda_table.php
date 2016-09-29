<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360InconsistenciasMonedaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_inconsistencias_moneda', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('moneda')->nullable();
			$table->integer('id_moneda');
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
		Schema::dropIfExists('360_inconsistencias_moneda');
	}

}
