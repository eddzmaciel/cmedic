<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360SucursalAlmacenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_sucursal_almacenes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_sucursal');
			$table->string('tipo_almacen')->nullable();
			$table->text('observaciones')->nullable();
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
		Schema::dropIfExists('360_sucursal_almacenes');
	}

}
