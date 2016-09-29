<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360NominaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_nomina', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_archivo_xml');
			$table->integer('dispercion')->default(0);
			$table->string('Antiguedad')->nullable();
			$table->string('CURP')->nullable();
			$table->string('Departamento')->nullable();
			$table->string('FechaFinalPago')->nullable();
			$table->string('FechaInicialPago')->nullable();
			$table->string('FechaInicioRelLaboral')->nullable();
			$table->string('FechaPago')->nullable();
			$table->string('NumDiasPagados')->nullable();
			$table->string('NumEmpleado')->nullable();
			$table->string('NumSeguridadSocial')->nullable();
			$table->string('PeriodicidadPago')->nullable();
			$table->string('Puesto')->nullable();
			$table->string('RegistroPatronal')->nullable();
			$table->string('RiesgoPuesto')->nullable();
			$table->string('SalarioBaseCotApor')->nullable();
			$table->string('SalarioDiarioIntegrado')->nullable();
			$table->string('TipoContrato')->nullable();
			$table->string('TipoRegimen')->nullable();
			$table->string('percepcion_total_excento')->nullable();
			$table->string('percepcion_total_gravado')->nullable();
			$table->string('deduccion_total_excento')->nullable();
			$table->string('deduccion_total_gravado')->nullable();
			$table->string('tipo_asiento')->nullable();
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
		Schema::dropIfExists('360_nomina');
	}

}
