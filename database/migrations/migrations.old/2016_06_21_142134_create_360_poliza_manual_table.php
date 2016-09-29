<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360PolizaManualTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_polizas_manuales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->string('poliza');
			$table->string('concepto');
			$table->string('tipo_documento')->nullable();
			$table->string('num_documento')->nullable();
			$table->string('tipo_cambio')->nullable();
			$table->string('tipo_poliza')->nullable();
			$table->integer('id_moneda');
			$table->string('año',10);
			$table->string('mes',10);
			$table->string('movimientos_bancarios',10)->nullable();
			$table->date('fecha')->nullable();
			$table->text('observaciones')->nullable();
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
		Schema::dropIfExists('360_polizas_manuales');
	}

}
