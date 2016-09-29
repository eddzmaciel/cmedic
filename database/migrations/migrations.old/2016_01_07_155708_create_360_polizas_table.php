<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360PolizasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_polizas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('folio_poliza')->nullable();
			$table->string('cuenta_ajuste')->nullable();
			$table->string('debe')->nullable();
			$table->string('haber')->nullable();
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
		Schema::dropIfExists('360_polizas');
	}

}
