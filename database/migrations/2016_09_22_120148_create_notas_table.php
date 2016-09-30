<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notas', function(Blueprint $table)
		{
			 $table->increments('id');
            $table->date('nfecha_emision');
            $table->integer('npid');
            $table->integer('nmid');
            $table->string('nmedicamentos');
            $table->integer('nestatus');
            $table->string('nnotas');
            //fk p_id
            //fk d_id
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
		Schema::drop('notas');
	}

}
