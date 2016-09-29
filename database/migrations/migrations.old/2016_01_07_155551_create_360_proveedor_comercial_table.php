<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ProveedorComercialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_proveedor_comercial', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_proveedor')->nullable();
			$table->string('rfc')->nullable();
			$table->integer('id_categoria_proveedor');
			$table->string('ranking')->nullable();
			$table->integer('id_zona_region')->nullable();
			$table->integer('id_vendedor')->nullable();
			$table->integer('id_lista_precios_aplicable')->nullable();
			$table->string('limite_credito')->nullable();
			$table->string('dias_credito')->nullable();
			$table->string('dias_envio_factura')->nullable();
			$table->string('dias_recepcion_factura')->nullable();
			$table->string('dias_pago_empresa')->nullable();
			$table->string('dias_vencimiento_prontopago')->nullable();
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
		Schema::dropIfExists('360_proveedor_comercial');
	}

}
