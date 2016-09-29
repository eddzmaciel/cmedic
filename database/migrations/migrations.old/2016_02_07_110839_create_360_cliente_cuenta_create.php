<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ClienteCuentaCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_clientes_cuentas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_cliente');
			$table->integer('id_banco');
			$table->integer('id_moneda');
			$table->string('num_cuenta');
			$table->string('principal');
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
		Schema::dropIfExists('360_clientes_cuentas');
	}

}
