<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360DescuentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_descuentos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_proveedor_comercial');
			$table->string('descuento')->nullable();
			$table->string('porcentaje')->nullable();
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
		Schema::dropIfExists('360_descuentos');
	}

}
