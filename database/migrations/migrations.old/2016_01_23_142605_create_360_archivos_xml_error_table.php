<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ArchivosXmlErrorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_archivos_xml_error', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->integer('id_sucursal');
			$table->integer('id_cc')->nullable();
			$table->integer('id_scc')->nullable();
			$table->string('uuid')->unique();
			$table->string('nombre_archivo')->nullable();
			$table->text('observaciones')->nullable();
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
		Schema::dropIfExists('360_archivos_xml_error');
	}

}
