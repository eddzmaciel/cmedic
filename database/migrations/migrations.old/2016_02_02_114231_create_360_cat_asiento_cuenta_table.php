<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CatAsientoCuentaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cat_asiento_cuenta_test', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipo_asiento')->nullable();
			$table->string('num_cuenta')->nullable();
			$table->string('nombre_cuenta')->nullable();
			$table->string('uso')->nullable();
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
		Schema::dropIfExists('360_cat_asiento_cuenta_test');
	}

}
