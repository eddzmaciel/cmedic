<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360NumeroFolios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_folios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->integer('folio');
			$table->string('tipo',10);
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
		
		Schema::dropIfExists('360_folios');
	}

}
