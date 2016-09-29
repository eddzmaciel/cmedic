<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create360TriggerFolioPolizaBancos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// DB::unprepared("CREATE TRIGGER create_folio_pb before INSERT ON `360_poliza_bancos` FOR EACH ROW
		// 				BEGIN
		// 				set new.poliza = concat('PB-', LPAD((SELECT f.folio FROM db_360.360_folios as f WHERE f.tipo='PB'),6,0));
		// 				END");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//DB::unprepared('DROP TRIGGER create_folio_pb');
	}

}
