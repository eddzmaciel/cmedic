<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CatMetodosPagoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cat_metodos_pago', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('clave')->nullable();
			$table->string('concepto')->nullable();
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
		Schema::dropIfExists('360_cat_metodos_pago');
	}

}
