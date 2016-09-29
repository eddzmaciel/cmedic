<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ProveedoresContactosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_proveedores_contactos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre')->nullable();
			$table->string('puesto')->nullable();
			$table->string('telefono')->nullable();
			$table->string('ext')->nullable();
			$table->string('email')->nullable();
			$table->string('tipo_contacto')->nullable();
			$table->integer('id_proveedor');
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
		Schema::dropIfExists('360_proveedores_contactos');
	}

}
