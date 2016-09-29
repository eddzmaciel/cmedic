<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ClienteContactoCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_clientes_contactos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_cliente');
			$table->string('nombre_contacto');
			$table->string('puesto');
			$table->string('telefono');
			$table->string('ext');
			$table->string('email');
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
		Schema::dropIfExists('360_clientes_contactos');
	}

}
