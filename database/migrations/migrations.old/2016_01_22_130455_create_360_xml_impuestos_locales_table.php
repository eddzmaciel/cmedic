<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360XmlImpuestosLocalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_xml_impuestos_locales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_archivos_xml');
			$table->integer('id_cuenta')->default(0);
			$table->integer('id_cuenta_fiscal')->default(0);
			$table->string('tipo_impuesto')->nullable();
			$table->string('nombre_impuesto')->nullable();
			$table->string('version')->nullable();
			$table->string('total_retenciones')->nullable();
			$table->string('total_traslados')->nullable();
			$table->string('tasa')->nullable();
			$table->string('importe')->nullable();
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
		Schema::dropIfExists('360_xml_impuestos_locales');
	}

}
