<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360PolizaManualArchivosXmlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_polizas_manuales_archivos_xml', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_poliza_manual');
			$table->double('monto',15,4)->default(0);
			$table->string('rfc');
			$table->string('uuid');
			$table->string('metodo_de_pago');
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
		Schema::dropIfExists('360_polizas_manuales_archivos_xml');
	}

}
