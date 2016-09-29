<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360NominaPercepcionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_nomina_percepciones_deducciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_nomina');
			$table->string('clave')->nullable();
			$table->string('concepto')->nullable();
			$table->string('importe_excento')->nullable();
			$table->string('importe_gravado')->nullable();
			$table->string('tipo_clave')->nullable();
			$table->string('tipo')->nullable();
			$table->integer('id_cuenta_contable')->default(0);
			$table->integer('id_cuenta_excepcion')->default(0);
			$table->integer('dispercion')->default(0);
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
		Schema::dropIfExists('360_nomina_percepciones_deducciones');
	}

}
