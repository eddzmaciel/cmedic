<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ContabilidadAutomaticaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_contabilidad_automatica', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_tipo_asiento');
			$table->integer('id_cuenta_contable');
			$table->string('codigo')->nullable();
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
		Schema::dropIfExists('360_contabilidad_automatica');
	}

}
