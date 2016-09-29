<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker; 
class MetodospagoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '01',
            'concepto' => 'Efectivo'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '02',
            'concepto' => 'Cheque'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '03',
            'concepto' => 'Transferencia'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '04',
            'concepto' => 'Tarjetas de crédito'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '05',
            'concepto' => 'Monederos electrónicos'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '06',
            'concepto' => 'Dinero electrónico'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '07',
            'concepto' => 'Tarjetas digitales'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '08',
            'concepto' => 'Vales de despensa'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '09',
            'concepto' => 'Bienes'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '10',
            'concepto' => 'Servicio'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '11',
            'concepto' => 'Por cuenta de tercero'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '12',
            'concepto' => 'Dación en pago'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '13',
            'concepto' => 'Pago por subrogación'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '14',
            'concepto' => 'Pago por consignación'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '15',
            'concepto' => 'Condonación'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '16',
            'concepto' => 'Cancelación'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '17',
            'concepto' => 'Compensación'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '98',
            'concepto' => 'NA'
        ));
        DB::table('360_cat_metodos_pago')->insert(array(
            'clave' => '99',
            'concepto' => 'Otros'
        ));
	}

}
