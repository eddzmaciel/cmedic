<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360XmlPolizaBancosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_xml_poliza_bancos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_poliza_bancos');
			$table->integer('id_xml_archivo');
			$table->double('anticipo',15,4)->default(0);
			$table->double('anticipo_por_tipo_cambio',15,4)->default(0);
			$table->double('importe_bancos',15,4)->default(0);
			$table->double('importe_notas_credito',15,4)->default(0);
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
		Schema::dropIfExists('360_xml_poliza_bancos');
	}

}
