<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker; 
class MonedasTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'AED',
            'moneda' => "Dirham de los Emiratos Árabes Unidos"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'AFN',
            'moneda' => "Afgani afgano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ALL',
            'moneda' => "Lek albanés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'AMD',
            'moneda' => "Dram armenio"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ANG',
            'moneda' => "Florín antillano neerlandés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'AOA',
            'moneda' => "Kwanza angoleño"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ARS',
            'moneda' => "Peso argentino"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'AUD',
            'moneda' => "Dólar australiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'AWG',
            'moneda' => "Florín arubeño"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'AZN',
            'moneda' => "Manat azerbaiyano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BAM',
            'moneda' => "Marco convertible de Bosnia-Herzegovina"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BBD',
            'moneda' => "Dólar de Barbados"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BDT',
            'moneda' => "Taka de Bangladés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BGN',
            'moneda' => "Lev búlgaro"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BHD',
            'moneda' => "Dinar bahreiní"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BIF',
            'moneda' => "Franco burundés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BMD',
            'moneda' => "Dólar de Bermuda"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BND',
            'moneda' => "Dólar de Brunéi"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BOB',
            'moneda' => "Boliviano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BOV',
            'moneda' => "Mvdol boliviano (código de fondos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BRL',
            'moneda' => "Real brasileño"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BSD',
            'moneda' => "Dólar bahameño"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BTN',
            'moneda' => "Ngultrum de Bután"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BWP',
            'moneda' => "Pula de Botsuana"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BYR',
            'moneda' => "Rublo bielorruso"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'BZD',
            'moneda' => "Dólar de Belice"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CAD',
            'moneda' => "Dólar canadiense"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CDF',
            'moneda' => "Franco congoleño, o congolés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CHF',
            'moneda' => "Franco suizo"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CLF',
            'moneda' => "Unidades de fomento chilenas (código de fondos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CLP',
            'moneda' => "Peso chileno"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CNY',
            'moneda' => "Yuan chino"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'COP',
            'moneda' => "Peso colombiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'COU',
            'moneda' => "Unidad de valor real colombiana (añadida al COP)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CRC',
            'moneda' => "Colón costarricense"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CSD',
            'moneda' => "Dinar serbio (Reemplazado por RSD el 25 de octubre de 2006)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CUP',
            'moneda' => "Peso cubano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CUC',
            'moneda' => "Peso cubano convertible"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CVE',
            'moneda' => "Escudo caboverdiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'CZK',
            'moneda' => "Koruna checa"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'DJF',
            'moneda' => "Franco yibutiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'DKK',
            'moneda' => "Corona danesa"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'DOP',
            'moneda' => "Peso dominicano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'DZD',
            'moneda' => "Dinar argelino"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'EGP',
            'moneda' => "Libra egipcia"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ERN',
            'moneda' => "Nakfa eritreo"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ETB',
            'moneda' => "Birr etíope"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'EUR',
            'moneda' => "Euro"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'FJD',
            'moneda' => "Dólar fiyiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'FKP',
            'moneda' => "Libra malvinense"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GBP',
            'moneda' => "Libra esterlina (libra de Gran Bretaña)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GEL',
            'moneda' => "Lari georgiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GHS',
            'moneda' => "Cedi ghanés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GIP',
            'moneda' => "Libra de Gibraltar"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GMD',
            'moneda' => "Dalasi gambiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GNF',
            'moneda' => "Franco guineano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GTQ',
            'moneda' => "Quetzal guatemalteco"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'GYD',
            'moneda' => "Dólar guyanés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'HKD',
            'moneda' => "Dólar de Hong Kong"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'HNL',
            'moneda' => "Lempira hondureño"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'HRK',
            'moneda' => "Kuna croata"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'HTG',
            'moneda' => "Gourde haitiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'HUF',
            'moneda' => "Forint húngaro"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'IDR',
            'moneda' => "Rupiah indonesia"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ILS',
            'moneda' => "Nuevo shéquel israelí"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'INR',
            'moneda' => "Rupia india"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'IQD',
            'moneda' => "Dinar iraquí"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'IRR',
            'moneda' => "Rial iraní"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ISK',
            'moneda' => "Króna islandesa"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'JMD',
            'moneda' => "Dólar jamaicano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'JOD',
            'moneda' => "Dinar jordano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'JPY',
            'moneda' => "Yen japonés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KES',
            'moneda' => "Chelín keniata"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KGS',
            'moneda' => "Som kirguís (de Kirguistán)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KHR',
            'moneda' => "Riel camboyano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KMF',
            'moneda' => "Franco comoriano (de Comoras)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KPW',
            'moneda' => "Won norcoreano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KRW',
            'moneda' => "Won surcoreano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KWD',
            'moneda' => "Dinar kuwaití"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KYD',
            'moneda' => "Dólar caimano (de Islas Caimán)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'KZT',
            'moneda' => "Tenge kazajo"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LAK',
            'moneda' => "Kip lao"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LBP',
            'moneda' => "Libra libanesa"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LKR',
            'moneda' => "Rupia de Sri Lanka"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LRD',
            'moneda' => "Dólar liberiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LSL',
            'moneda' => "Loti lesotense"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LTL',
            'moneda' => "Litas lituano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LVL',
            'moneda' => "Lat letón"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'LYD',
            'moneda' => "Dinar libio"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MAD',
            'moneda' => "Dirham marroquí"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MDL',
            'moneda' => "Leu moldavo"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MGA',
            'moneda' => "Ariary malgache"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MKD',
            'moneda' => "Denar macedonio"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MMK',
            'moneda' => "Kyat birmano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MNT',
            'moneda' => "Tughrik mongol"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MOP',
            'moneda' => "Pataca de Macao"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MRO',
            'moneda' => "Ouguiya mauritana"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MUR',
            'moneda' => "Rupia mauricia"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MVR',
            'moneda' => "Rufiyaa maldiva"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MWK',
            'moneda' => "Kwacha malauí"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MXN',
            'moneda' => "Peso mexicano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MXV',
            'moneda' => "Unidad de Inversión (UDI) mexicana (código de fondos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MYR',
            'moneda' => "Ringgit malayo"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'MZN',
            'moneda' => "Metical mozambiqueño"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'NAD',
            'moneda' => "Dólar namibio"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'NGN',
            'moneda' => "Naira nigeriana"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'NIO',
            'moneda' => "Córdoba nicaragüense"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'NOK',
            'moneda' => "Corona noruega"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'NPR',
            'moneda' => "Rupia nepalesa"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'NZD',
            'moneda' => "Dólar neozelandés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'OMR',
            'moneda' => "Rial omaní"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'PAB',
            'moneda' => "Balboa panameña"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'PEN',
            'moneda' => "Nuevo sol peruano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'PGK',
            'moneda' => "Kina de Papúa Nueva Guinea"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'PHP',
            'moneda' => "Peso filipino"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'PKR',
            'moneda' => "Rupia pakistaní"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'PLN',
            'moneda' => "zloty polaco"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'PYG',
            'moneda' => "Guaraní paraguayo"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'QAR',
            'moneda' => "Rial qatarí"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'RON',
            'moneda' => "Leu rumano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'RUB',
            'moneda' => "Rublo ruso"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'RWF',
            'moneda' => "Franco ruandés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SAR',
            'moneda' => "Riyal saudí"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SBD',
            'moneda' => "Dólar de las Islas Salomón"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SCR',
            'moneda' => "Rupia de Seychelles"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SDG',
            'moneda' => "Dinar sudanés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SEK',
            'moneda' => "Corona sueca"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SGD',
            'moneda' => "Dólar de Singapur"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SHP',
            'moneda' => "Libra de Santa Helena"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SLL',
            'moneda' => "Leone de Sierra Leona"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SOS',
            'moneda' => "Chelín somalí"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SRD',
            'moneda' => "Dólar surinamés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'STD',
            'moneda' => "Dobra de Santo Tomé y Príncipe"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SYP',
            'moneda' => "Libra siria"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'SZL',
            'moneda' => "Lilangeni suazi"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'THB',
            'moneda' => "Baht tailandés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TJS',
            'moneda' => "Somoni tayik (de Tayikistán)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TMT',
            'moneda' => "Manat turcomano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TND',
            'moneda' => "Dinar tunecino"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TOP',
            'moneda' => "Pa'anga tongano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TRY',
            'moneda' => "Lira turca"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TTD',
            'moneda' => "Dólar de Trinidad y Tobago"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TWD',
            'moneda' => "Dólar taiwanés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'TZS',
            'moneda' => "Chelín tanzano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'UAH',
            'moneda' => "Grivna ucraniana"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'UGX',
            'moneda' => "Chelín ugandés"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'USD',
            'moneda' => "Dólar estadounidense"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'USN',
            'moneda' => "Dólar estadounidense (Siguiente día) (código de fondos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'USS',
            'moneda' => "Dólar estadounidense (Mismo día) (código de fondos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'UYU',
            'moneda' => "Peso uruguayo"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'UZS',
            'moneda' => "Som uzbeko"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'VEF',
            'moneda' => "Bolívar fuerte venezolano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'VND',
            'moneda' => "Dong vietnamita"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'VUV',
            'moneda' => "Vatu vanuatense"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'WST',
            'moneda' => "Tala samoana"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XAF',
            'moneda' => "Franco CFA de África Central"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XAG',
            'moneda' => "Onza de plata"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XAU',
            'moneda' => "Onza de oro"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XBA',
            'moneda' => "European Composite Unit (EURCO) (unidad del mercado de bonos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XBB',
            'moneda' => "European Monetary Unit (E.M.U.-6) (unidad del mercado de bonos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XBC',
            'moneda' => "European Unit of Account 9 (E.U.A.-9) (unidad del mercado de bonos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XBD',
            'moneda' => "European Unit of Account 17 (E.U.A.-17) (unidad del mercado de bonos)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XCD',
            'moneda' => "Dólar del Caribe Oriental"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XDR',
            'moneda' => "Derechos Especiales de Giro (FMI)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XFO',
            'moneda' => "Franco de oro (Special settlement currency)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XFU',
            'moneda' => "Franco UIC (Special settlement currency)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XOF',
            'moneda' => "Franco CFA de África Occidental"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XPD',
            'moneda' => "Onza de paladio"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XPF',
            'moneda' => "Franco CFP"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XPT',
            'moneda' => "Onza de platino"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XTS',
            'moneda' => "Reservado para pruebas"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'XXX',
            'moneda' => "Sin divisa"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'YER',
            'moneda' => "Rial yemení (de Yemen)"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ZAR',
            'moneda' => "Rand sudafricano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ZMW',
            'moneda' => "Kwacha zambiano"
        ));
        DB::table('360_cat_monedas')->insert(array(
            'codigo' => 'ZWL',
            'moneda' => "Dólar zimbabuense"
        ));
	}

}
