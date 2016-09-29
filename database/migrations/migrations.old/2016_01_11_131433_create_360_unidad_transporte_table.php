<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360UnidadTransporteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_unidad_transporte', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion')->nullable();
			$table->integer('id_cuenta_contable')->nullable();
			$table->string('modelo')->nullable();
			$table->string('año')->nullable();
			$table->string('importe')->nullable();
			$table->string('placa')->nullable();
			$table->integer('id_operador')->nullable();	
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
		Schema::dropIfExists('360_unidad_transporte');
	}

}
