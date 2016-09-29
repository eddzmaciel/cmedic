<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360ProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('360_productos', function(Blueprint $table){
			$table->increments('id');
			$table->string('codigo')->nullable();
			$table->string('descripcion')->nullable();
			$table->string('precio_costo')->nullable();
			$table->string('precio_venta')->nullable();
			$table->string('categoria')->nullable();
			$table->string('linea')->nullable();
			$table->string('marca')->nullable();
			$table->string('nombre_producto')->nullable();
			$table->string('unidad_medida')->nullable();
			$table->string('unidad_empaque')->nullable();
			$table->string('c_unidad_medida')->nullable();
			$table->string('c_unidad_empaque')->nullable();
			$table->integer('stock_max')->nullable();
			$table->integer('stock_min')->nullable();
			$table->string('reorder')->nullable();
			$table->string('puntos_me')->nullable();
			$table->string('iva')->nullable();
			$table->string('ieps')->nullable();
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
	Schema::dropIfExists('360_productos');
	}

}
