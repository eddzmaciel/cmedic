<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360XmlConceptosTable extends Migration {

		/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_xml_conceptos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_archivo_xml');
			$table->string('cantidad')->nullable();
			$table->string('unidad')->nullable();
			$table->string('noIdentificacion')->nullable();
			$table->string('descripcion')->nullable();
			$table->string('valorUnitario')->nullable();
			$table->string('importe')->nullable();
			$table->double('debe', 15, 4)->default(0);
			$table->double('haber', 15, 4)->default(0);
			$table->string('tasa_iva')->default('NA');
			$table->double('anticipo', 15, 4)->default(0);
			$table->double('saldo', 15, 4)->default(0);
			$table->string('no_deducible')->default(0);
			$table->integer('IVAAcreIdent')->default(0);
			$table->integer('IvaAcreNOIdent')->default(0);
			$table->integer('IVAAcreExento')->default(0);
			$table->integer('id_cuenta')->default(0);
			$table->integer('dispercion')->default(0);
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
		Schema::dropIfExists('360_xml_conceptos');
	}

}
