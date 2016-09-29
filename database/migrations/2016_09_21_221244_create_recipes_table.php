<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 schema::create('recipes',function(blueprint $table)
        {   
            $table->increments('id');
            $table->date('rfecha_emision');
            $table->string('rmedicamentos');
            $table->integer('restatus');
            $table->string('rnotas');
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
		Schema::drop('recipes');
	}

}
