<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CatBancosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cat_bancos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('clave')->nullable();
			$table->string('nombre_corto')->nullable();
			$table->string('razon_social')->nullable();
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
		Schema::dropIfExists('360_cat_bancos');
	}

}
