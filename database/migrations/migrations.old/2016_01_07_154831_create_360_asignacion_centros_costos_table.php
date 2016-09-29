<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360AsignacionCentrosCostosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_asignacion_centros_costos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_sucursal');
			$table->integer('id_centro_costos');
			$table->string('num')->nullable();
			$table->integer('id_sub_centro_costos');
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
		Schema::dropIfExists('360_asignacion_centros_costos');
	}

}
