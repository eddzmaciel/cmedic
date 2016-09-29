<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360PolizaManualAsientoContableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_polizas_manuales_asiento_contable', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_poliza_manual');
			$table->double('cargo',15,4)->default(0);
			$table->double('abono',15,4)->default(0);
			$table->integer('id_proveedor');
			$table->integer('id_empleado');
			$table->integer('id_cliente');
			$table->integer('id_cuenta_contable');
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
		Schema::dropIfExists('360_polizas_manuales_asiento_contable');
	}

}
