<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ServiciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_servicios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codigo')->nullable();
			$table->string('descripcion')->nullable();
			$table->integer('id_unidad_medida')->nullable();
			$table->integer('id_cuenta')->nullable();
			$table->string('iva_16')->nullable();
			$table->string('iva_0')->nullable();
			$table->string('iva_excento')->nullable();
			$table->string('ret_iva_honorarios')->nullable();
			$table->string('ret_iva_arredamiento')->nullable();
			$table->string('ret_isr_honorarios')->nullable();
			$table->string('ret_isr_arredamiento')->nullable();
			$table->string('ret_iva_4')->nullable();
			$table->string('ret_5_millar')->nullable();
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
		Schema::dropIfExists('360_servicios');
	}

}
