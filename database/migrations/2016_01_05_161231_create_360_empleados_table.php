<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360EmpleadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_empleados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->integer('id_sucursal')->default(0);
			$table->string('nombre')->nullable();
			$table->string('rfc')->nullable();
			$table->string('curp')->unique();
			$table->date('fecha_alta')->nullable();
			$table->date('fecha_baja')->nullable();
			$table->string('regimen_pago_sat')->nullable();
			$table->string('puesto')->nullable();
			$table->string('salario_nomina')->nullable();
			$table->string('sdi')->nullable();
			$table->string('nss')->nullable();
			$table->string('tipo_contrato_sat')->nullable();
			$table->string('periodo_pago_sat')->nullable();
			$table->string('telefono')->nullable();
			$table->string('calle')->nullable();
			$table->string('num_exterior')->nullable();
			$table->string('num_interior')->nullable();
			$table->string('piso')->nullable();
			$table->string('pais')->nullable();
			$table->string('colonia')->nullable();
			$table->string('codigo_postal')->nullable();
			$table->string('ciudad_municipio')->nullable();
			$table->string('estado')->nullable();
			$table->string('email')->nullable();
			$table->integer('estatus')->default(0);
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
		Schema::dropIfExists('360_empleados');
	}

}
