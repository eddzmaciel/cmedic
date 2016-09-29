<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ProveedoresBancosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_proveedores_bancos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_proveedor');
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
		Schema::dropIfExists('360_proveedores_bancos');
	}

}
