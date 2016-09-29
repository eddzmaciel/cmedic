<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360TriggerFolioPolizaDiaria extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// DB::unprepared("CREATE TRIGGER create_folio_pd before INSERT ON `360_archivos_xml` FOR EACH ROW
		// 				BEGIN
		// 				set new.poliza = concat('PB-', LPAD((SELECT f.folio FROM db_360.360_folios as f WHERE f.tipo='PD'),6,0));
		// 				END");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//DB::unprepared('DROP TRIGGER create_folio_pd');
	}

}
