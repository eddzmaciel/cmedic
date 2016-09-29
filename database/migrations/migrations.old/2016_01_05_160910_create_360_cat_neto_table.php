<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CatNetoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cat_neto', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codigo')->nullable();
			$table->string('cuenta_contable')->nullable();
			$table->string('codigo_sat')->nullable();
			$table->string('tipo')->nullable();
			$table->string('categoria_cuenta')->nullable();
			$table->string('nivel_detalle')->nullable();
			$table->integer('nivel')->nullable();
			$table->integer('acc')->nullable();
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
		Schema::dropIfExists('360_cat_neto');
	}

}
