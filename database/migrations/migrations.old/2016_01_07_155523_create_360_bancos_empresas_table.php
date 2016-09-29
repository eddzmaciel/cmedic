<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360BancosEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_bancos_empresas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_banco');
			$table->integer('id_moneda');
			$table->string('num_cuenta')->nullable();
			$table->string('principal')->nullable();
			$table->integer('id_cuenta_contable');
			$table->integer('id_sucursal')->default(0);
			$table->integer('id_empresa');
			$table->string('saldo_inicial')->nullable();
			$table->date('fecha')->nullable();
			$table->integer('id_cuenta_complementaria');
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
		Schema::dropIfExists('360_bancos_empresas');
	}

}
