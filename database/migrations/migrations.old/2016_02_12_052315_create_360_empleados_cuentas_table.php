<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360EmpleadosCuentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_empleados_cuentas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empleado');
			$table->integer('id_banco');
			$table->integer('id_moneda');
			$table->string('num_cuenta');
			$table->string('principal')->nullable();
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
		Schema::dropIfExists('360_empleados_cuentas');
	}

}
