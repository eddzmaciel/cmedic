<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ArchivosXmlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_archivos_xml', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->integer('id_sucursal')->default(0);
			$table->integer('id_cc')->default(0);
			$table->integer('id_scc')->default(0);
			$table->string('uuid');
			$table->string('nombre_archivo')->nullable();
			$table->string('condiciones_de_pago')->nullable();
			$table->string('descuento')->nullable();
			$table->string('descuento_detalle')->nullable();
			$table->string('fecha')->nullable();
			$table->string('folio')->nullable();
			$table->string('forma_de_pago')->nullable();
			$table->string('metodo_de_pago')->nullable();
			$table->string('moneda')->nullable();
			$table->string('serie')->nullable();
			$table->string('subTotal')->nullable();
			$table->string('tipo_cambio')->nullable();
			$table->string('tipo_comprobante')->nullable();
			$table->double('total',15,2)->default(0);
			$table->double('total_debe',15,2)->default(0);
			$table->double('total_debe_tc',15,2)->default(0);
			$table->double('total_haber',15,2)->default(0);
			$table->double('total_haber_tc',15,2)->default(0);
			$table->integer('id_metodo_pago')->default(1);
			$table->integer('id_moneda')->default(101);			
			$table->string('poliza')->nullable();
			$table->string('fecha_timbrado')->nullable();
			$table->string('fecha_cancelado')->nullable();
			$table->integer('estatus')->default(0);
			$table->string('origen')->nullable();
			$table->string('estatus_sat')->nullable();
			$table->string('ajuste_a_pesos')->nullable();
			$table->string('total_plz')->nullable();
			$table->string('dh_ajuste')->nullable();
			$table->smallInteger('cont')->nullable();
			$table->string('impuesto_trasladados')->default(0);
			$table->string('impuestos_retenidos')->default(0);
			$table->string('impuestos_locales')->default(0);
			$table->double('anticipo', 15, 4)->default(0);
			$table->double('saldo', 15, 4)->default(0);
			$table->double('debe_ajuste_pesos', 15, 4)->default(0);
			$table->double('haber_ajuste_pesos', 15, 4)->default(0);
			$table->double('debe_descuento', 15, 4)->default(0);
			$table->double('haber_descuento', 15, 4)->default(0);
			$table->integer('id_entidad')->nullable();
			$table->integer('id_cuenta_total_xml')->default(0);
			$table->integer('id_cuenta_descuento')->default(0);
			$table->integer('id_cuenta_ajuste_pesos')->default(0);
			$table->timestamps();


			/*$table->foreign('id_entidad')->references('id')->on('360_nomina')
                ->onUpdate('cascade')->onDelete('cascade');
    		$table->foreign('id')->references('id_archivo_xml')->on('360_xml_conceptos')
                ->onUpdate('cascade')->onDelete('cascade');
              $table->foreign('id')->references('id_archivo_xml')->on('360_xml_impuestos_locales')
                ->onUpdate('cascade')->onDelete('cascade');*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('360_archivos_xml');
	}

}
