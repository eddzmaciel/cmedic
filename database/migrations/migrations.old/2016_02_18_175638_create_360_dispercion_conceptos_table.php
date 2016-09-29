<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360DispercionConceptosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_dispercion_conceptos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_xml_concepto');
			$table->string('id_cuenta')->nullable();
			$table->double('monto',15,4)->default(0);					
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
		Schema::dropIfExists('360_dispercion_conceptos');
	}

}
