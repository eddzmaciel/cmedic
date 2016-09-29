<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		schema::create('citas',function(blueprint $table)
        {   
            $table->increments('id');
            $table->date('cfecha');
            $table->string('cnotas');
            $table->string('cpid');
            $table->integer('cdid');
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
		  Schema::dropIfExists('citas');
	}

}
