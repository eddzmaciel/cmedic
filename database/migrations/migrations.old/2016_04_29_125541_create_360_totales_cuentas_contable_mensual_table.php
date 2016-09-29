<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360TotalesCuentasContableMensualTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_saldos_cuenta_contable_mensual', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_cuenta_contable');
			$table->integer('id_ejercicio');
			$table->double('enero',15,4)->default(0);
			$table->double('febrero',15,4)->default(0);
			$table->double('marzo',15,4)->default(0);
			$table->double('abril',15,4)->default(0);
			$table->double('mayo',15,4)->default(0);
			$table->double('junio',15,4)->default(0);
			$table->double('julio',15,4)->default(0);
			$table->double('agosto',15,4)->default(0);
			$table->double('septiembre',15,4)->default(0);
			$table->double('octubre',15,4)->default(0);
			$table->double('noviembre',15,4)->default(0);
			$table->double('diciembre',15,4)->default(0);
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
		Schema::dropIfExists('360_saldos_cuenta_contable_mensual');
	}

}
