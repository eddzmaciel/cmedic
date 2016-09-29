<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360SubCentroCostosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_sub_centro_costos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_centro_costos');
			$table->string('nombre')->nullable();
			$table->integer('status')->default(1);
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
		Schema::dropIfExists('360_sub_centro_costos');
	}


}
