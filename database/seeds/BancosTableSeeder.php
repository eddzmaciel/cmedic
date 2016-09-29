<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker; 
class BancosTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        DB::table('360_cat_bancos')->insert(array(
            'clave' => "002",
            'nombre_corto' => "BANAMEX",
            'razon_social' => "Banco Nacional de México, S.A., Institución de Banca Múltiple, Grupo Financiero Banamex"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "006",
            'nombre_corto' => "BANCOMEXT",
            'razon_social' => "Banco Nacional de Comercio Exterior, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "009",
            'nombre_corto' => "BANOBRAS",
            'razon_social' => "Banco Nacional de Obras y Servicios Públicos, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "012",
            'nombre_corto' => "BBVA BANCOMER",
            'razon_social' => "BBVA Bancomer, S.A., Institución de Banca Múltiple, Grupo Financiero BBVA Bancomer"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "014",
            'nombre_corto' => "SANTANDER",
            'razon_social' => "Banco Santander (México), S.A., Institución de Banca Múltiple, Grupo Financiero Santander"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "019",
            'nombre_corto' => "BANJERCITO",
            'razon_social' => "Banco Nacional del Ejército, Fuerza Aérea y Armada, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "021",
            'nombre_corto' => "HSBC",
            'razon_social' => "HSBC México, S.A., institución De Banca Múltiple, Grupo Financiero HSBC"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "030",
            'nombre_corto' => "BAJIO",
            'razon_social' => "Banco del Bajío, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "032",
            'nombre_corto' => "IXE",
            'razon_social' => "IXE Banco, S.A., Institución de Banca Múltiple, IXE Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "036",
            'nombre_corto' => "INBURSA",
            'razon_social' => "Banco Inbursa, S.A., Institución de Banca Múltiple, Grupo Financiero Inbursa"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "037",
            'nombre_corto' => "INTERACCIONES",
            'razon_social' => "Banco Interacciones, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "042",
            'nombre_corto' => "MIFEL",
            'razon_social' => "Banca Mifel, S.A., Institución de Banca Múltiple, Grupo Financiero Mifel"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "044",
            'nombre_corto' => "SCOTIABANK",
            'razon_social' => "Scotiabank Inverlat, S.A."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "058",
            'nombre_corto' => "BANREGIO",
            'razon_social' => "Banco Regional de Monterrey, S.A., Institución de Banca Múltiple, Banregio Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "059",
            'nombre_corto' => "INVEX",
            'razon_social' => "Banco Invex, S.A., Institución de Banca Múltiple, Invex Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "060",
            'nombre_corto' => "BANSI",
            'razon_social' => "Bansi, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "062",
            'nombre_corto' => "AFIRME",
            'razon_social' => "Banca Afirme, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "072",
            'nombre_corto' => "BANORTE",
            'razon_social' => "Banco Mercantil del Norte, S.A., Institución de Banca Múltiple, Grupo Financiero Banorte"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "102",
            'nombre_corto' => "THE",
            'razon_social' => "ROYAL BANK  The Royal Bank of Scotland México, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "103",
            'nombre_corto' => "AMERICAN",
            'razon_social' => "EXPRESS    American Express Bank (México), S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "106",
            'nombre_corto' => "BAMSA",
            'razon_social' => "Bank of America México, S.A., Institución de Banca Múltiple, Grupo Financiero Bank of America"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "108",
            'nombre_corto' => "TOKYO",
            'razon_social' => "Bank of Tokyo-Mitsubishi UFJ (México), S.A."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "110",
            'nombre_corto' => "JP MORGAN",
            'razon_social' => "Banco J.P. Morgan, S.A., Institución de Banca Múltiple, J.P. Morgan Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "112",
            'nombre_corto' => "BMONEX",
            'razon_social' => "Banco Monex, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "113",
            'nombre_corto' => "VE POR MAS",
            'razon_social' => "Banco Ve Por Mas, S.A. Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "116",
            'nombre_corto' => "ING",
            'razon_social' => "ING Bank (México), S.A., Institución de Banca Múltiple, ING Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "124",
            'nombre_corto' => "DEUTSCHE",
            'razon_social' => "Deutsche Bank México, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "126",
            'nombre_corto' => "CREDIT SUISSE",
            'razon_social' => "Banco Credit Suisse (México), S.A. Institución de Banca Múltiple, Grupo Financiero Credit Suisse (México)"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "127",
            'nombre_corto' => "AZTECA",
            'razon_social' => "Banco Azteca, S.A. Institución de Banca Múltiple."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "128",
            'nombre_corto' => "AUTOFIN",
            'razon_social' => "Banco Autofin México, S.A. Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "129",
            'nombre_corto' => "BARCLAYS",
            'razon_social' => "Barclays Bank México, S.A., Institución de Banca Múltiple, Grupo Financiero Barclays México"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "130",
            'nombre_corto' => "COMPARTAMOS",
            'razon_social' => "Banco Compartamos, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "131",
            'nombre_corto' => "BANCO FAMSA",
            'razon_social' => "Banco Ahorro Famsa, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "132",
            'nombre_corto' => "BMULTIVA",
            'razon_social' => "Banco Multiva, S.A., Institución de Banca Múltiple, Multivalores Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "133",
            'nombre_corto' => "ACTINVER",
            'razon_social' => "Banco Actinver, S.A. Institución de Banca Múltiple, Grupo Financiero Actinver"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "134",
            'nombre_corto' => "WAL-MART",
            'razon_social' => "Banco Wal-Mart de México Adelante, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "135",
            'nombre_corto' => "NAFIN",
            'razon_social' => "Nacional Financiera, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "136",
            'nombre_corto' => "INTERBANCO",
            'razon_social' => "Inter Banco, S.A. Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "137",
            'nombre_corto' => "BANCOPPEL",
            'razon_social' => "BanCoppel, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "138",
            'nombre_corto' => "ABC CAPITAL",
            'razon_social' => "ABC Capital, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "139",
            'nombre_corto' => "UBS BANK",
            'razon_social' => "UBS Bank México, S.A., Institución de Banca Múltiple, UBS Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "140",
            'nombre_corto' => "CONSUBANCO",
            'razon_social' => "Consubanco, S.A. Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "141",
            'nombre_corto' => "VOLKSWAGEN",
            'razon_social' => "Volkswagen Bank, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "143",
            'nombre_corto' => "CIBANCO",
            'razon_social' => "CIBanco, S.A."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "145",
            'nombre_corto' => "BBASE",
            'razon_social' => "Banco Base, S.A., Institución de Banca Múltiple"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "166",
            'nombre_corto' => "BANSEFI",
            'razon_social' => "Banco del Ahorro Nacional y Servicios Financieros, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "168",
            'nombre_corto' => "HIPOTECARIA FEDERAL",
            'razon_social' => "Sociedad Hipotecaria Federal, Sociedad Nacional de Crédito, Institución de Banca de Desarrollo"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "600",
            'nombre_corto' => "MONEXCB",
            'razon_social' => "Monex Casa de Bolsa, S.A. de C.V. Monex Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "601",
            'nombre_corto' => "GBM",
            'razon_social' => "GBM Grupo Bursátil Mexicano, S.A. de C.V. Casa de Bolsa"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "602",
            'nombre_corto' => "MASARI",
            'razon_social' => "Masari Casa de Bolsa, S.A."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "605",
            'nombre_corto' => "VALUE",
            'razon_social' => "Value, S.A. de C.V. Casa de Bolsa"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "606",
            'nombre_corto' => "ESTRUCTURADORES",
            'razon_social' => "Estructuradores del Mercado de Valores Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "607",
            'nombre_corto' => "TIBER",
            'razon_social' => "Casa de Cambio Tiber, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "608",
            'nombre_corto' => "VECTOR",
            'razon_social' => "Vector Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "610",
            'nombre_corto' => "B&B",
            'razon_social' => "B y B, Casa de Cambio, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "614",
            'nombre_corto' => "ACCIVAL",
            'razon_social' => "Acciones y Valores Banamex, S.A. de C.V., Casa de Bolsa"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "615",
            'nombre_corto' => "MERRILL LYNCH",
            'razon_social' => "Merrill Lynch México, S.A. de C.V. Casa de Bolsa"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "616",
            'nombre_corto' => "FINAMEX",
            'razon_social' => "Casa de Bolsa Finamex, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "617",
            'nombre_corto' => "VALMEX",
            'razon_social' => "Valores Mexicanos Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "618",
            'nombre_corto' => "UNICA",
            'razon_social' => "Unica Casa de Cambio, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "619",
            'nombre_corto' => "MAPFRE",
            'razon_social' => "MAPFRE Tepeyac, S.A."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "620",
            'nombre_corto' => "PROFUTURO",
            'razon_social' => "Profuturo G.N.P., S.A. de C.V., Afore"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "621",
            'nombre_corto' => "CB ACTINVER",
            'razon_social' => "Actinver Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "622",
            'nombre_corto' => "OACTIN",
            'razon_social' => "OPERADORA ACTINVER, S.A. DE C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "623",
            'nombre_corto' => "SKANDIA",
            'razon_social' => "Skandia Vida, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "626",
            'nombre_corto' => "CBDEUTSCHE",
            'razon_social' => "Deutsche Securities, S.A. de C.V. CASA DE BOLSA"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "627",
            'nombre_corto' => "ZURICH",
            'razon_social' => "Zurich Compañía de Seguros, S.A."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "628",
            'nombre_corto' => "ZURICHVI",
            'razon_social' => "Zurich Vida, Compañía de Seguros, S.A."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "629",
            'nombre_corto' => "SU CASITA",
            'razon_social' => "Hipotecaria Su Casita, S.A. de C.V. SOFOM ENR"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "630",
            'nombre_corto' => "CB INTERCAM",
            'razon_social' => "Intercam Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "631",
            'nombre_corto' => "CI BOLSA",
            'razon_social' => "CI Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "632",
            'nombre_corto' => "BULLTICK CB",
            'razon_social' => "Bulltick Casa de Bolsa, S.A., de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "633",
            'nombre_corto' => "STERLING",
            'razon_social' => "Sterling Casa de Cambio, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "634",
            'nombre_corto' => "FINCOMUN",
            'razon_social' => "Fincomún, Servicios Financieros Comunitarios, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "636",
            'nombre_corto' => "HDI SEGUROS",
            'razon_social' => "HDI Seguros, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "637",
            'nombre_corto' => "ORDER",
            'razon_social' => "Order Express Casa de Cambio, S.A. de C.V"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "638",
            'nombre_corto' => "AKALA",
            'razon_social' => "Akala, S.A. de C.V., Sociedad Financiera Popular"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "640",
            'nombre_corto' => "CB JPMORGAN",
            'razon_social' => "J.P. Morgan Casa de Bolsa, S.A. de C.V. J.P. Morgan Grupo Financiero"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "642",
            'nombre_corto' => "REFORMA",
            'razon_social' => "Operadora de Recursos Reforma, S.A. de C.V., S.F.P."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "646",
            'nombre_corto' => "STP",
            'razon_social' => "Sistema de Transferencias y Pagos STP, S.A. de C.V.SOFOM ENR"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "647",
            'nombre_corto' => "TELECOMM",
            'razon_social' => "Telecomunicaciones de México"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "648",
            'nombre_corto' => "EVERCORE",
            'razon_social' => "Evercore Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "649",
            'nombre_corto' => "SKANDIA",
            'razon_social' => "Skandia Operadora de Fondos, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "651",
            'nombre_corto' => "SEGMTY",
            'razon_social' => "Seguros Monterrey New York Life, S.A de C.V"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "652",
            'nombre_corto' => "ASEA",
            'razon_social' => "Solución Asea, S.A. de C.V., Sociedad Financiera Popular"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "653",
            'nombre_corto' => "KUSPIT",
            'razon_social' => "Kuspit Casa de Bolsa, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "655",
            'nombre_corto' => "SOFIEXPRESS",
            'razon_social' => "J.P. SOFIEXPRESS, S.A. de C.V., S.F.P."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "656",
            'nombre_corto' => "UNAGRA",
            'razon_social' => "UNAGRA, S.A. de C.V., S.F.P."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "659",
            'nombre_corto' => "OPCIONES EMPRESARIALES DEL NOROESTE",
            'razon_social' => "OPCIONES EMPRESARIALES DEL NORESTE, S.A. DE C.V., S.F.P."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "901",
            'nombre_corto' => "CLS",
            'razon_social' => "Cls Bank International"
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "902",
            'nombre_corto' => "INDEVAL",
            'razon_social' => "SD. Indeval, S.A. de C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "670",
            'nombre_corto' => "LIBERTAD",
            'razon_social' => "Libertad Servicios Financieros, S.A. De C.V."
        ));
        DB::table('360_cat_bancos')->insert(array(
            'clave' => "999",
            'nombre_corto' => "N/A",
            'razon_social' => ""
        ));
	}

}
