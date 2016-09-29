<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('pacientes',function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('pnombre');
                $table->string('papellidos');
                $table->integer('pedad');
                $table->string('pdireccion')->nullable();
                $table->integer('ptelefono');
                $table->string('ptipo_sangre')->nullable();
                $table->string('pemail');
                //fk id_medico;
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
	  Schema::dropIfExists('cm_pacientes');
	}

}
