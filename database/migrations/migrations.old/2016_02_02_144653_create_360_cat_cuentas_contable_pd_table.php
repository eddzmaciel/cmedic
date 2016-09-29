<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360CatCuentasContablePdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_cat_cuentas_contable_pd', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_empresa')->default(0);
			$table->string('concepto')->nullable();
			$table->string('origen')->nullable();
			$table->string('tipo')->nullable();
			$table->integer('codigo_cuenta_contable')->nullable();
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
		Schema::dropIfExists('360_cat_cuentas_contable_pd');
	}

}
