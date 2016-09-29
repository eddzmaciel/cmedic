<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CentroCostosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_centro_costos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_sucursal');
			$table->string('descripcion')->nullable();
			$table->string('nombre_corto')->nullable();
			$table->date('vigencia')->nullable();
			$table->string('id_activo')->nullable();
			$table->integer('tipo')->nullable();
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
		Schema::dropIfExists('360_centro_costos');
	}

}
