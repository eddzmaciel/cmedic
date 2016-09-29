<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360EjerciciosContablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_ejercicios_contables', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->string('ejercicio')->nullable();
			$table->integer('status')->default(1);
			$table->string('num_poliza')->default(0);
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
		Schema::dropIfExists('360_ejercicios_contables');
	}

}
