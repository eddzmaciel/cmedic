<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 schema::create('medicos',function(blueprint $table)
        {   
            $table->increments('id');
            $table->string('dcedprof');
            $table->string('dnombre');
            $table->string('dapellidos');
            $table->integer('dtelefono');
            $table->string('demail');
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
		 Schema::dropIfExists('medicos');
	}

}
