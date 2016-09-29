<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CatNominaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cat_nomina', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipo_asiento')->nullable();
			$table->string('codigo_sat')->nullable();
			$table->string('descripcion_sat')->nullable();
			$table->string('num_cuenta')->nullable();
			$table->string('descripcion_cuenta')->nullable();
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
		Schema::dropIfExists('360_cat_nomina');
	}

}
