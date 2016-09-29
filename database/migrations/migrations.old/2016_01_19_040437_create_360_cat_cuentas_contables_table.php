<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CatCuentasContablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cat_cuentas_contables', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codigo')->nullable();
			$table->string('cuenta_contable')->nullable();
			$table->string('cod_sat')->nullable();
			$table->string('tipo')->nullable();
			$table->string('categoria_cuenta')->nullable();
			$table->string('nivel_detalle')->nullable();
			$table->integer('nivel')->nullable();	
			$table->string('acc')->nullable();
			$table->string('afectable')->nullable();
			$table->string('subCuenta')->nullable();
			$table->double('saldo_inicial', 15, 4)->default(0);
			$table->integer('id_empresa')->unsigned()->index();
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
		Schema::dropIfExists('360_cat_cuentas_contables');
	}

}
