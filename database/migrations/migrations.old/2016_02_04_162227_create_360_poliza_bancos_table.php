<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360PolizaBancosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_poliza_bancos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa');
			$table->integer('id_cuenta_bancaria')->default(0);			
			$table->integer('id_cuenta_contable_origen')->default(0);			
			$table->integer('id_cuenta_contable_destino')->default(0);			
			$table->integer('id_entidad')->default(0);
			$table->integer('id_cuenta_bancaria_entidad')->default(0);
			$table->string('tipo_documento')->nullable();
			$table->string('num_documento')->nullable();
			$table->string('tipo_cambio')->nullable();
			$table->double('cantidad_tipo_cambio',15,4);
			$table->string('año');
			$table->string('mes');
			$table->string('poliza')->nullable();
			$table->date('fecha');
			$table->text('observaciones')->nullable();
			$table->string('movimiento_bancario')->nullable();
			$table->string('tipo_poliza');
			$table->double('aplicado',15,4);
			$table->double('importe',15,4);
			$table->double('ncc_ncf',15,4);
			$table->double('saldo',15,4);
			$table->integer('estatus')->default(0);
			$table->timestamps();

			/*$table->foreign('id')->references('id_poliza')->on('360_movimientos_balanza')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id')->references('id_poliza')->on('360_movimientos_cuentas_contables')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id')->references('id_poliza')->on('360_movimientos_impuestos_cuentas_contables')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id')->references('id_poliza')->on('360_movimientos_percepciones_deducciones')
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
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::dropIfExists('360_poliza_bancos');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}