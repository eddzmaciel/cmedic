<?php namespace App\Http\Controllers\Contabilidad;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Empresas;
use App\Models\Contabilidad\Folios;
use Illuminate\Http\Request;
ini_set('max_execution_time', 180);

class EmpresasController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Empresas::where('status','!=','0')->get();
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		try{
			$rules = array(
				'rfc' 		=> 'required|unique:360_empresas',
	    		'nombre' 		=> 'required',
	    	);
			$v = \Validator::make($request->all(),$rules);
			if($v->fails()){
				return redirect('/#contabilidad/empresas')->withWarning('Error!!, Se ha presentado un problema, informe : '.$v->errors());			
			}
			$info = $request->all();
			$logo_empresa = "logo_empresa.png";
			if($request->file('logo_empresa')){				
				$file = $request->file('logo_empresa');
		       	$logo_empresa = $file->getClientOriginalName();
		       	\Storage::disk('logos_empresas')->put($logo_empresa,  \File::get($file));
			}
			$info['logo_empresa'] = $logo_empresa;
			$data = Empresas::create($info);
			
			$polizaDiario = array(
					"id_empresa" => $data->id,
					"folio" => 1,
					"tipo" => "PD",
				);
			$pd = Folios::create($polizaDiario);

			$polizaBancosI = array(
					"id_empresa" => $data->id,
					"folio" => 1,
					"tipo" => "PI",
				);
			$pbi = Folios::create($polizaBancosI);
			$polizaBancosE = array(
					"id_empresa" => $data->id,
					"folio" => 1,
					"tipo" => "PE",
				);
			$pbe = Folios::create($polizaBancosE);

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1",
			          "cuenta_contable" => "ACTIVO",
			          "subcuenta" => "",
			          "cod_sat" => "100.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Título",
			          "nivel" => "1",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11",
			          "cuenta_contable" => "ACTIVOS CIRCULANTES",
			          "subcuenta" => "1",
			          "cod_sat" => "100.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "111",
			          "cuenta_contable" => "Efectivo y Equivalentes de Efectivo",
			          "subcuenta" => "11",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "111-02",
			          "cuenta_contable" => "Fondo Fijo de Caja",
			          "subcuenta" => "111",
			          "cod_sat" => "101.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1110201",
			          "cuenta_contable" => "Caja Chica",
			          "subcuenta" => "111-02",
			          "cod_sat" => "101.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "111-03",
			          "cuenta_contable" => "Bancos",
			          "subcuenta" => "111",
			          "cod_sat" => "102.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1110301",
			          "cuenta_contable" => "Bancos Moneda Nacional",
			          "subcuenta" => "111-03",
			          "cod_sat" => "102.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "111030101",
			          "cuenta_contable" => "Banamex cta: 9999999",
			          "subcuenta" => "1110301",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1110302",
			          "cuenta_contable" => "Bancos Moneda Extranjera",
			          "subcuenta" => "111-03",
			          "cod_sat" => "102.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "111030201",
			          "cuenta_contable" => "Bancos Dolares",
			          "subcuenta" => "1110302",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11103020101",
			          "cuenta_contable" => "IBC BANK cta: 88888888",
			          "subcuenta" => "111030201",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubSubCuenta",
			          "nivel" => "7",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11103020150",
			          "cuenta_contable" => "Complementaria de Cambios Dolares",
			          "subcuenta" => "111030201",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubSubCuenta",
			          "nivel" => "7",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "111-04",
			          "cuenta_contable" => "Inversiones Temporales",
			          "subcuenta" => "111",
			          "cod_sat" => "103.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1110401",
			          "cuenta_contable" => "Bonos y Acciones Temporales",
			          "subcuenta" => "111-04",
			          "cod_sat" => "103.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1110402",
			          "cuenta_contable" => "Inversiones en Fideicomisos",
			          "subcuenta" => "111-04",
			          "cod_sat" => "103.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1110403",
			          "cuenta_contable" => "Otras Inversiones",
			          "subcuenta" => "111-04",
			          "cod_sat" => "103.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113",
			          "cuenta_contable" => "Cuentas y Documentos por Cobrar",
			          "subcuenta" => "11",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113-05",
			          "cuenta_contable" => "Clientes",
			          "subcuenta" => "113",
			          "cod_sat" => "105.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1130501",
			          "cuenta_contable" => "Clientes Nacionales",
			          "subcuenta" => "113-05",
			          "cod_sat" => "105.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Clientes_Nacional_Principal",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1130502",
			          "cuenta_contable" => "Clientes Extranjeros",
			          "subcuenta" => "113-05",
			          "cod_sat" => "105.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Clientes_Extranjero_Principal",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1130503",
			          "cuenta_contable" => "Clientes Nacionales Partes Relacionadas",
			          "subcuenta" => "113-05",
			          "cod_sat" => "105.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1130504",
			          "cuenta_contable" => "Clientes Extranjeros Partes Relacionadas",
			          "subcuenta" => "113-05",
			          "cod_sat" => "105.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113-10",
			          "cuenta_contable" => "Cuentas por Cobrar Corto Plazo",
			          "subcuenta" => "113",
			          "cod_sat" => "106.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131002",
			          "cuenta_contable" => "Cuentas y documentos por cobrar a corto plazo nacional",
			          "subcuenta" => "113-10",
			          "cod_sat" => "106.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131004",
			          "cuenta_contable" => "Cuentas y documentos por cobrar a corto plazo extranjero",
			          "subcuenta" => "1131002",
			          "cod_sat" => "106.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131006",
			          "cuenta_contable" => "Cuentas y documentos por cobrar a corto plazo nacional parte relacionada",
			          "subcuenta" => "1131004",
			          "cod_sat" => "106.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131008",
			          "cuenta_contable" => "Cuentas y documentos por cobrar a corto plazo extranjero parte relacionada",
			          "subcuenta" => "1131006",
			          "cod_sat" => "106.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131010",
			          "cuenta_contable" => "Intereses por cobrar a corto plazo nacional",
			          "subcuenta" => "1131008",
			          "cod_sat" => "106.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131012",
			          "cuenta_contable" => "Intereses por cobrar a corto plazo extranjero",
			          "subcuenta" => "1131010",
			          "cod_sat" => "106.06",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131014",
			          "cuenta_contable" => "Intereses por cobrar a corto plazo nacional parte relacionada",
			          "subcuenta" => "1131012",
			          "cod_sat" => "106.07",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131016",
			          "cuenta_contable" => "Intereses por cobrar a corto plazo extranjero parte relacionada",
			          "subcuenta" => "1131014",
			          "cod_sat" => "106.08",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131018",
			          "cuenta_contable" => "Otras cuentas y documentos por cobrar a corto plazo",
			          "subcuenta" => "1131016",
			          "cod_sat" => "106.09",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131020",
			          "cuenta_contable" => "Otras cuentas y documentos por cobrar a corto plazo parte relacionada",
			          "subcuenta" => "1131018",
			          "cod_sat" => "106.10",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113-15",
			          "cuenta_contable" => "Deudores Diversos",
			          "subcuenta" => "113",
			          "cod_sat" => "107.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131501",
			          "cuenta_contable" => "Funcionarios y Empleados",
			          "subcuenta" => "113-15",
			          "cod_sat" => "107.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Cuentas_de_Ajustes_de_Egresos_Bancos_XML_Funcionarios",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131502",
			          "cuenta_contable" => "Socios y accionistas",
			          "subcuenta" => "113-15",
			          "cod_sat" => "107.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113150201",
			          "cuenta_contable" => "Socio X",
			          "subcuenta" => "1131502",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131503",
			          "cuenta_contable" => "Partes relacionadas nacionales",
			          "subcuenta" => "113-15",
			          "cod_sat" => "107.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Cuentas_de_Egresos_sin_XML",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113150301",
			          "cuenta_contable" => "Parte Relacionada Nal x",
			          "subcuenta" => "1131503",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131504",
			          "cuenta_contable" => "Partes relacionadas extranjeros",
			          "subcuenta" => "113-15",
			          "cod_sat" => "107.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113150401",
			          "cuenta_contable" => "Parte Relacionada Ext x ",
			          "subcuenta" => "1131504",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1131505",
			          "cuenta_contable" => "Otros deudores diversos",
			          "subcuenta" => "113-15",
			          "cod_sat" => "107.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113150501",
			          "cuenta_contable" => "Otro Deudor x ",
			          "subcuenta" => "1131505",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "Cuentas_de_Egresos_sin_XML",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113-20",
			          "cuenta_contable" => "Estimación Para Cuentas Incobrables",
			          "subcuenta" => "113",
			          "cod_sat" => "108.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132001",
			          "cuenta_contable" => "Estimación de cuentas incobrables nacional",
			          "subcuenta" => "113-20",
			          "cod_sat" => "108.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132002",
			          "cuenta_contable" => "Estimación de cuentas incobrables extranjero",
			          "subcuenta" => "1132001",
			          "cod_sat" => "108.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132003",
			          "cuenta_contable" => "Estimación de cuentas incobrables nacional parte relacionada",
			          "subcuenta" => "1132002",
			          "cod_sat" => "108.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132004",
			          "cuenta_contable" => "Estimación de cuentas incobrables extranjero parte relacionada",
			          "subcuenta" => "1132003",
			          "cod_sat" => "108.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "113-25",
			          "cuenta_contable" => "Anticipo a Proveedores",
			          "subcuenta" => "113",
			          "cod_sat" => "120.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132501",
			          "cuenta_contable" => "Anticipo a proveedores nacional ",
			          "subcuenta" => "113-25",
			          "cod_sat" => "120.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Anticipos_a_Proveedores",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132502",
			          "cuenta_contable" => "Anticipo a proveedores extranjero ",
			          "subcuenta" => "1132501",
			          "cod_sat" => "120.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132503",
			          "cuenta_contable" => "Anticipo a proveedores nacional parte relacionada ",
			          "subcuenta" => "1132502",
			          "cod_sat" => "120.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1132504",
			          "cuenta_contable" => "Anticipo a proveedores extranjero parte relacionada ",
			          "subcuenta" => "1132503",
			          "cod_sat" => "120.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115",
			          "cuenta_contable" => "Inventarios ",
			          "subcuenta" => "11",
			          "cod_sat" => "115.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-05",
			          "cuenta_contable" => "Inventario",
			          "subcuenta" => "115",
			          "cod_sat" => "115.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1150501",
			          "cuenta_contable" => "Inventario",
			          "subcuenta" => "115-05",
			          "cod_sat" => "115.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-10",
			          "cuenta_contable" => "Inventario en Producto Terminado",
			          "subcuenta" => "115",
			          "cod_sat" => "115.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1151001",
			          "cuenta_contable" => "Inventario en Producto Terminado",
			          "subcuenta" => "115-10",
			          "cod_sat" => "115.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-15",
			          "cuenta_contable" => "Inventario en Materia Prima",
			          "subcuenta" => "115",
			          "cod_sat" => "115.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1151501",
			          "cuenta_contable" => "Inventario en Materia Prima",
			          "subcuenta" => "115-15",
			          "cod_sat" => "115.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-20",
			          "cuenta_contable" => "Inventario en Producción",
			          "subcuenta" => "115",
			          "cod_sat" => "115.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1152001",
			          "cuenta_contable" => "Inventario en Producción",
			          "subcuenta" => "115-20",
			          "cod_sat" => "115.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-25",
			          "cuenta_contable" => "Inventario en Consignación",
			          "subcuenta" => "115",
			          "cod_sat" => "115.06",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1152501",
			          "cuenta_contable" => "Inventario en Consignación",
			          "subcuenta" => "115-25",
			          "cod_sat" => "115.06",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-30",
			          "cuenta_contable" => "Mercancías en Tránsito",
			          "subcuenta" => "115",
			          "cod_sat" => "115.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1153001",
			          "cuenta_contable" => "Mercancías en Tránsito",
			          "subcuenta" => "115-30",
			          "cod_sat" => "115.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-35",
			          "cuenta_contable" => "Deterioro Acumulado de Inventarios",
			          "subcuenta" => "115",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1153501",
			          "cuenta_contable" => "Deterioro Acumulado de Inventarios ",
			          "subcuenta" => "115-35",
			          "cod_sat" => "116.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "115-40",
			          "cuenta_contable" => "Estimación por Obsolescencia de Inventario",
			          "subcuenta" => "115",
			          "cod_sat" => "116.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1154001",
			          "cuenta_contable" => "Estimación por Obsolescencia de Inventario",
			          "subcuenta" => "115-40",
			          "cod_sat" => "116.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117",
			          "cuenta_contable" => "Otros Derechos por Impuestos y Retenciones",
			          "subcuenta" => "11",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117-05",
			          "cuenta_contable" => "I.V.A. Acreditable",
			          "subcuenta" => "117",
			          "cod_sat" => "119.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1170501",
			          "cuenta_contable" => "I.V.A Acreditable al 16%",
			          "subcuenta" => "117-05",
			          "cod_sat" => "119.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1170502",
			          "cuenta_contable" => "I.V.A. 4% Retenido por Clientes",
			          "subcuenta" => "117-05",
			          "cod_sat" => "119.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1170503",
			          "cuenta_contable" => "I.V.A. 16% Pagado en Aduanas",
			          "subcuenta" => "117-05",
			          "cod_sat" => "119.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1170504",
			          "cuenta_contable" => "I.V.A. Acreeditable 11%",
			          "subcuenta" => "117-05",
			          "cod_sat" => "119.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1170505",
			          "cuenta_contable" => "I.V.A. Acreeditable 0%",
			          "subcuenta" => "117-05",
			          "cod_sat" => "119.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1170506",
			          "cuenta_contable" => "I.V.A. Acreeditable Exento",
			          "subcuenta" => "117-05",
			          "cod_sat" => "119.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117-10",
			          "cuenta_contable" => "I.V.A.  Acreditable Fiscal Pagado",
			          "subcuenta" => "117",
			          "cod_sat" => "118.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171001",
			          "cuenta_contable" => "I.V.A. Acreditable Fiscal Pagado al  16%",
			          "subcuenta" => "117-10",
			          "cod_sat" => "118.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171002",
			          "cuenta_contable" => "I.V.A. Acreditable Fiscal Pagado en Aduanas",
			          "subcuenta" => "117-10",
			          "cod_sat" => "118.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171003",
			          "cuenta_contable" => "I.V.A. 4% Retenido por Clientes Fiscal",
			          "subcuenta" => "117-10",
			          "cod_sat" => "118.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117-15",
			          "cuenta_contable" => "Saldos a Favor de Impuestos",
			          "subcuenta" => "117",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171501",
			          "cuenta_contable" => "I.V.A. del Ejercicio en Curso",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171502",
			          "cuenta_contable" => "I.V.A. de Ejercicios Anteriores",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171503",
			          "cuenta_contable" => "ISR  a favor ",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171504",
			          "cuenta_contable" => "IETU a favor ",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171505",
			          "cuenta_contable" => "IDE a favor ",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171506",
			          "cuenta_contable" => "IA a favor ",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171507",
			          "cuenta_contable" => "Subsidio al empleo  Ejercicio Anterior",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.06",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171508",
			          "cuenta_contable" => "Pago de lo indebido ",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.07",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1171509",
			          "cuenta_contable" => "Otros impuestos a favor ",
			          "subcuenta" => "117-15",
			          "cod_sat" => "113.08",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117-30",
			          "cuenta_contable" => "Impuestos Anticipados",
			          "subcuenta" => "117",
			          "cod_sat" => "114.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173001",
			          "cuenta_contable" => "I.S.R. en Pagos Provisionales",
			          "subcuenta" => "117-30",
			          "cod_sat" => "114.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173002",
			          "cuenta_contable" => "I.S.R. Retenido por el Banco",
			          "subcuenta" => "117-30",
			          "cod_sat" => "113.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173003",
			          "cuenta_contable" => "I.S.R. Retenido por Clientes",
			          "subcuenta" => "117-30",
			          "cod_sat" => "113.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173004",
			          "cuenta_contable" => "I.V.A. Retenido por Clientes",
			          "subcuenta" => "117-30",
			          "cod_sat" => "113.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173005",
			          "cuenta_contable" => "5% ISR Regimen Intermedio al Estado",
			          "subcuenta" => "117-30",
			          "cod_sat" => "113.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173006",
			          "cuenta_contable" => "I.S.R. Retenido por Clientes Pagado",
			          "subcuenta" => "117-30",
			          "cod_sat" => "113.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173007",
			          "cuenta_contable" => "I.V.A. Retenido por  Clientes Pagado",
			          "subcuenta" => "117-30",
			          "cod_sat" => "113.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173008",
			          "cuenta_contable" => "IDE Retenido por el Banco",
			          "subcuenta" => "117-30",
			          "cod_sat" => "113.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1173009",
			          "cuenta_contable" => "Subsidio al Empleo Ejercicio Actual Pagado",
			          "subcuenta" => "117-30",
			          "cod_sat" => "110.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Pago_Bancos_nominas_traslado",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117-40",
			          "cuenta_contable" => "Crédito Diesel por Aplicar",
			          "subcuenta" => "117",
			          "cod_sat" => "111.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1174001",
			          "cuenta_contable" => "Crédito Diesel por Aplicar",
			          "subcuenta" => "117-40",
			          "cod_sat" => "111.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117-45",
			          "cuenta_contable" => "Otros Estimulos",
			          "subcuenta" => "117",
			          "cod_sat" => "112.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1174501",
			          "cuenta_contable" => "Otros Estimulos",
			          "subcuenta" => "117-45",
			          "cod_sat" => "112.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "117-50",
			          "cuenta_contable" => "Subsidio al Empleo Ejercicio Actual",
			          "subcuenta" => "117",
			          "cod_sat" => "110.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1175001",
			          "cuenta_contable" => "Subsidio al Empleo Ejercicio Actual",
			          "subcuenta" => "117-50",
			          "cod_sat" => "110.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Subidio_al_Empleo_poliza_nominas",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "119",
			          "cuenta_contable" => "Gastos y Pagos Anticipados",
			          "subcuenta" => "11",
			          "cod_sat" => "109.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11903",
			          "cuenta_contable" => "Seguros y fianzas pagados por anticipado nacional ",
			          "subcuenta" => "119",
			          "cod_sat" => "109.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11906",
			          "cuenta_contable" => "Seguros y fianzas pagados por anticipado extranjero ",
			          "subcuenta" => "119",
			          "cod_sat" => "109.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11909",
			          "cuenta_contable" => "Seguros y fianzas pagados por anticipado nacional parte relacionada ",
			          "subcuenta" => "119",
			          "cod_sat" => "109.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11912",
			          "cuenta_contable" => "Seguros y fianzas pagados por anticipado extranjero parte relacionada ",
			          "subcuenta" => "119",
			          "cod_sat" => "109.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "11915",
			          "cuenta_contable" => "Rentas pagados por anticipado nacional ",
			          "subcuenta" => "119",
			          "cod_sat" => "109.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "12",
			          "cuenta_contable" => "ACTIVOS NO CIRCULANTES",
			          "subcuenta" => "1",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "121",
			          "cuenta_contable" => "Propiedad Planta y Equipo",
			          "subcuenta" => "12",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "121-02",
			          "cuenta_contable" => "Terrenos",
			          "subcuenta" => "121",
			          "cod_sat" => "151.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210201",
			          "cuenta_contable" => "Terrenos #1",
			          "subcuenta" => "121-02",
			          "cod_sat" => "151.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "121-04",
			          "cuenta_contable" => "Edificios",
			          "subcuenta" => "121",
			          "cod_sat" => "152.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210401",
			          "cuenta_contable" => "Edificios #01",
			          "subcuenta" => "121-04",
			          "cod_sat" => "152.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210402",
			          "cuenta_contable" => "Edificios #02",
			          "subcuenta" => "121-04",
			          "cod_sat" => "152.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210403",
			          "cuenta_contable" => "Edificios #03",
			          "subcuenta" => "121-04",
			          "cod_sat" => "152.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "121-06",
			          "cuenta_contable" => "Maquinaria y Equipo",
			          "subcuenta" => "121",
			          "cod_sat" => "153.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210601",
			          "cuenta_contable" => "Maquinaria y Equipo #01",
			          "subcuenta" => "121-06",
			          "cod_sat" => "153.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210602",
			          "cuenta_contable" => "Maquinaria y Equipo #02",
			          "subcuenta" => "121-06",
			          "cod_sat" => "153.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210603",
			          "cuenta_contable" => "Maquinaria y Equipo #03",
			          "subcuenta" => "121-06",
			          "cod_sat" => "153.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210604",
			          "cuenta_contable" => "Maquinaria y Equipo #04",
			          "subcuenta" => "121-06",
			          "cod_sat" => "153.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210605",
			          "cuenta_contable" => "Maquinaria y Equipo #05",
			          "subcuenta" => "121-06",
			          "cod_sat" => "153.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "121-08",
			          "cuenta_contable" => "Equipo de Transporte y Reparto",
			          "subcuenta" => "121",
			          "cod_sat" => "154.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210801",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #01",
			          "subcuenta" => "121-08",
			          "cod_sat" => "154.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210802",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #02",
			          "subcuenta" => "121-08",
			          "cod_sat" => "154.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210803",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #03",
			          "subcuenta" => "121-08",
			          "cod_sat" => "154.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210804",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #04",
			          "subcuenta" => "121-08",
			          "cod_sat" => "154.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1210805",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #05",
			          "subcuenta" => "121-08",
			          "cod_sat" => "154.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "121-10",
			          "cuenta_contable" => "Mobiliario y Eq. de Oficina",
			          "subcuenta" => "121",
			          "cod_sat" => "155.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211001",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #01",
			          "subcuenta" => "121-10",
			          "cod_sat" => "155.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211002",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #02",
			          "subcuenta" => "121-10",
			          "cod_sat" => "155.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211003",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #03",
			          "subcuenta" => "121-10",
			          "cod_sat" => "155.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211004",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #04",
			          "subcuenta" => "121-10",
			          "cod_sat" => "155.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211005",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #05",
			          "subcuenta" => "121-10",
			          "cod_sat" => "155.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "121-12",
			          "cuenta_contable" => "Equipo de Computo",
			          "subcuenta" => "121",
			          "cod_sat" => "156.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211201",
			          "cuenta_contable" => "Equipo de Computo #1",
			          "subcuenta" => "121-12",
			          "cod_sat" => "156.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211202",
			          "cuenta_contable" => "Equipo de Computo #2",
			          "subcuenta" => "121-12",
			          "cod_sat" => "156.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211203",
			          "cuenta_contable" => "Equipo de Computo #3",
			          "subcuenta" => "121-12",
			          "cod_sat" => "156.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211204",
			          "cuenta_contable" => "Equipo de Computo #4",
			          "subcuenta" => "121-12",
			          "cod_sat" => "156.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1211205",
			          "cuenta_contable" => "Equipo de Computo #5",
			          "subcuenta" => "121-12",
			          "cod_sat" => "156.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "123",
			          "cuenta_contable" => "Depreciacón Acumulada de Propiedad Planta y Equipo",
			          "subcuenta" => "12",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "123-04",
			          "cuenta_contable" => "Edificios",
			          "subcuenta" => "123",
			          "cod_sat" => "171.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230401",
			          "cuenta_contable" => "Edificios #01",
			          "subcuenta" => "123-04",
			          "cod_sat" => "171.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230402",
			          "cuenta_contable" => "Edificios #02",
			          "subcuenta" => "123-04",
			          "cod_sat" => "171.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230403",
			          "cuenta_contable" => "Edificios #03",
			          "subcuenta" => "123-04",
			          "cod_sat" => "171.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "123-06",
			          "cuenta_contable" => "Maquinaria y Equipo",
			          "subcuenta" => "123",
			          "cod_sat" => "171.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230601",
			          "cuenta_contable" => "Maquinaria y Equipo #01",
			          "subcuenta" => "123-06",
			          "cod_sat" => "171.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230602",
			          "cuenta_contable" => "Maquinaria y Equipo #02",
			          "subcuenta" => "123-06",
			          "cod_sat" => "171.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230603",
			          "cuenta_contable" => "Maquinaria y Equipo #03",
			          "subcuenta" => "123-06",
			          "cod_sat" => "171.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230604",
			          "cuenta_contable" => "Maquinaria y Equipo #04",
			          "subcuenta" => "123-06",
			          "cod_sat" => "171.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230605",
			          "cuenta_contable" => "Maquinaria y Equipo #05",
			          "subcuenta" => "123-06",
			          "cod_sat" => "171.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "123-08",
			          "cuenta_contable" => "Equipo de Transporte y Reparto",
			          "subcuenta" => "123",
			          "cod_sat" => "171.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230801",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #01",
			          "subcuenta" => "123-08",
			          "cod_sat" => "171.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230802",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #02",
			          "subcuenta" => "123-08",
			          "cod_sat" => "171.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "12308803",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #03",
			          "subcuenta" => "123-08",
			          "cod_sat" => "171.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230804",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #04",
			          "subcuenta" => "123-08",
			          "cod_sat" => "171.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1230805",
			          "cuenta_contable" => "Equipo de Transporte y Reparto #05",
			          "subcuenta" => "123-08",
			          "cod_sat" => "171.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "123-10",
			          "cuenta_contable" => "Mobiliario y Eq. de Oficina",
			          "subcuenta" => "123",
			          "cod_sat" => "171.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231001",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #01",
			          "subcuenta" => "123-10",
			          "cod_sat" => "171.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231002",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #02",
			          "subcuenta" => "123-10",
			          "cod_sat" => "171.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231003",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #03",
			          "subcuenta" => "123-10",
			          "cod_sat" => "171.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231004",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #04",
			          "subcuenta" => "123-10",
			          "cod_sat" => "171.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231005",
			          "cuenta_contable" => "Mobiliarios y Equipo Varios #05",
			          "subcuenta" => "123-10",
			          "cod_sat" => "171.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "123-12",
			          "cuenta_contable" => "Equipo de Computo",
			          "subcuenta" => "123",
			          "cod_sat" => "171.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231201",
			          "cuenta_contable" => "Equipo de Computo #1",
			          "subcuenta" => "123-12",
			          "cod_sat" => "171.05",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231202",
			          "cuenta_contable" => "Equipo de Computo #2",
			          "subcuenta" => "123-12",
			          "cod_sat" => "171.05",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231203",
			          "cuenta_contable" => "Equipo de Computo #3",
			          "subcuenta" => "123-12",
			          "cod_sat" => "171.05",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231204",
			          "cuenta_contable" => "Equipo de Computo #4",
			          "subcuenta" => "123-12",
			          "cod_sat" => "171.05",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1231205",
			          "cuenta_contable" => "Equipo de Computo #5",
			          "subcuenta" => "123-12",
			          "cod_sat" => "171.05",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "125",
			          "cuenta_contable" => "Revaluaciones de Propiedad Planta y Equipo",
			          "subcuenta" => "12",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "125-05",
			          "cuenta_contable" => "Revaluación de Terrenos",
			          "subcuenta" => "125",
			          "cod_sat" => "191.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1250501",
			          "cuenta_contable" => "Revaluación de Terrenos",
			          "subcuenta" => "125-05",
			          "cod_sat" => "191.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "125-10",
			          "cuenta_contable" => "Revaluación de Edificios",
			          "subcuenta" => "125",
			          "cod_sat" => "191.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1251001",
			          "cuenta_contable" => "Revaluación de Edificios",
			          "subcuenta" => "125-10",
			          "cod_sat" => "191.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "125-15",
			          "cuenta_contable" => "Revaluación de Maquinaria y  Equipo",
			          "subcuenta" => "125",
			          "cod_sat" => "191.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1251501",
			          "cuenta_contable" => "Revaluación de Maquinaria y  Equipo",
			          "subcuenta" => "125-15",
			          "cod_sat" => "191.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "125-20",
			          "cuenta_contable" => "Revaluación de Equipo de Transporte y Reparto",
			          "subcuenta" => "125",
			          "cod_sat" => "191.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1252001",
			          "cuenta_contable" => "Revaluación de Equipo de Transporte y Reparto",
			          "subcuenta" => "125-20",
			          "cod_sat" => "191.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "125-25",
			          "cuenta_contable" => "Revaluación de Mobiliario y Equipo de Oficina",
			          "subcuenta" => "125",
			          "cod_sat" => "191.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1252501",
			          "cuenta_contable" => "Revaluación de Mobiliario y Equipo de Oficina",
			          "subcuenta" => "125-25",
			          "cod_sat" => "191.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "125-30",
			          "cuenta_contable" => "Revaluación de Equipo de Computo",
			          "subcuenta" => "125",
			          "cod_sat" => "191.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1253001",
			          "cuenta_contable" => "Revaluación de Equipo de Computo",
			          "subcuenta" => "125-30",
			          "cod_sat" => "191.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "127",
			          "cuenta_contable" => "Otros Activos NO Circulantes",
			          "subcuenta" => "12",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "127-05",
			          "cuenta_contable" => "Adaptaciones y Mejoras",
			          "subcuenta" => "127",
			          "cod_sat" => "170.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1270501",
			          "cuenta_contable" => "Adaptaciones y Mejoras",
			          "subcuenta" => "127-05",
			          "cod_sat" => "170.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "127-10",
			          "cuenta_contable" => "Gastos Preoperativos",
			          "subcuenta" => "127",
			          "cod_sat" => "174.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1271001",
			          "cuenta_contable" => "Gastos Preoperativos",
			          "subcuenta" => "127-10",
			          "cod_sat" => "174.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "127-15",
			          "cuenta_contable" => "Gastos de Instalación",
			          "subcuenta" => "127",
			          "cod_sat" => "181.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1271501",
			          "cuenta_contable" => "Gastos de Instalación",
			          "subcuenta" => "127-15",
			          "cod_sat" => "181.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "127-20",
			          "cuenta_contable" => "Gastos de Organización",
			          "subcuenta" => "127",
			          "cod_sat" => "177.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1272001",
			          "cuenta_contable" => "Gastos de Organización",
			          "subcuenta" => "127-20",
			          "cod_sat" => "177.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "127-25",
			          "cuenta_contable" => "Depósitos en Garantía",
			          "subcuenta" => "127",
			          "cod_sat" => "184.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1272501",
			          "cuenta_contable" => "Depósitos de fianzas",
			          "subcuenta" => "127-25",
			          "cod_sat" => "184.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1272502",
			          "cuenta_contable" => "Depósitos de arrendamiento de bienes inmuebles",
			          "subcuenta" => "127-25",
			          "cod_sat" => "184.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1272503",
			          "cuenta_contable" => "Otros depósitos en garantía",
			          "subcuenta" => "127-25",
			          "cod_sat" => "184.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "130",
			          "cuenta_contable" => "Activos Intangibles",
			          "subcuenta" => "12",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "130-05",
			          "cuenta_contable" => "Patentes y Marcas",
			          "subcuenta" => "130",
			          "cod_sat" => "179.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1300501",
			          "cuenta_contable" => "Patentes y Marcas",
			          "subcuenta" => "130-05",
			          "cod_sat" => "179.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "130-10",
			          "cuenta_contable" => "Crédito Mercantil",
			          "subcuenta" => "130",
			          "cod_sat" => "180.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "1301001",
			          "cuenta_contable" => "Crédito Mercantil",
			          "subcuenta" => "130-10",
			          "cod_sat" => "180.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2",
			          "cuenta_contable" => "PASIVO",
			          "subcuenta" => "",
			          "cod_sat" => "200.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Título",
			          "nivel" => "1",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "21",
			          "cuenta_contable" => "PASIVOS CIRCULANTES",
			          "subcuenta" => "2",
			          "cod_sat" => "200.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "211",
			          "cuenta_contable" => "Préstamos Bancarios a Corto Plazo",
			          "subcuenta" => "21",
			          "cod_sat" => "202.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "211-05",
			          "cuenta_contable" => "Préstamos Bancarios Nacionales",
			          "subcuenta" => "211",
			          "cod_sat" => "202.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2110505",
			          "cuenta_contable" => "Crédito x en Banco x",
			          "subcuenta" => "211-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "211-10",
			          "cuenta_contable" => "Préstamos Bancarios Extranjeros",
			          "subcuenta" => "211",
			          "cod_sat" => "202.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2111001",
			          "cuenta_contable" => "Credito x en Banco x",
			          "subcuenta" => "211-10",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213",
			          "cuenta_contable" => "Cuentas y Documentos por Pagar",
			          "subcuenta" => "21",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213-05",
			          "cuenta_contable" => "Proveedores",
			          "subcuenta" => "213",
			          "cod_sat" => "201.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2130505",
			          "cuenta_contable" => "Proveedores Nacionales",
			          "subcuenta" => "213-05",
			          "cod_sat" => "201.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Proveedor_Nacional_Principal",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2130510",
			          "cuenta_contable" => "Proveedores Extranjeros",
			          "subcuenta" => "213-05",
			          "cod_sat" => "201.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Proveedor_Extranjero_Principal",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2130515",
			          "cuenta_contable" => "Proveedores Nacionales Parte Relacionada",
			          "subcuenta" => "213-05",
			          "cod_sat" => "201.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2130520",
			          "cuenta_contable" => "Proveedores Extranjeros Parte Relacionada ",
			          "subcuenta" => "213-05",
			          "cod_sat" => "201.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213-10",
			          "cuenta_contable" => "Anticipo de Clientes",
			          "subcuenta" => "213",
			          "cod_sat" => "206.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2131005",
			          "cuenta_contable" => "Anticipo de Clientes Nacional",
			          "subcuenta" => "213-10",
			          "cod_sat" => "206.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Anticipos_Depositos_Clientes_Nacional",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213-15",
			          "cuenta_contable" => "Cobros Anticipados a Corto Plazo",
			          "subcuenta" => "213",
			          "cod_sat" => "203.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2131510",
			          "cuenta_contable" => "Rentas cobradas por anticipado a corto plazo nacional ",
			          "subcuenta" => "213-15",
			          "cod_sat" => "203.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213151005",
			          "cuenta_contable" => "Rentas cobradas #1",
			          "subcuenta" => "2131510",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213-20",
			          "cuenta_contable" => "Acreedores Diversos",
			          "subcuenta" => "213",
			          "cod_sat" => "205.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2132005",
			          "cuenta_contable" => "Socios y Accionistas",
			          "subcuenta" => "213-20",
			          "cod_sat" => "205.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213250501",
			          "cuenta_contable" => "Nombre X",
			          "subcuenta" => "2132005",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2132020",
			          "cuenta_contable" => "Partes Relacionadas",
			          "subcuenta" => "213-20",
			          "cod_sat" => "205.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213251001",
			          "cuenta_contable" => "Nombre X",
			          "subcuenta" => "2132020",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2132030",
			          "cuenta_contable" => "Acreedores Diversos Varios",
			          "subcuenta" => "213-20",
			          "cod_sat" => "205.06",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "213252001",
			          "cuenta_contable" => "Nombre X",
			          "subcuenta" => "2132030",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "Cuentas_de_Depositos_sin_XML",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215",
			          "cuenta_contable" => "Obligaciones por Impuestos y Retenciones por Pagar",
			          "subcuenta" => "21",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215-05",
			          "cuenta_contable" => "Impuestos retenidos",
			          "subcuenta" => "215",
			          "cod_sat" => "216.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150505",
			          "cuenta_contable" => "I.S.R. Ret. a Empleados",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "ISR_Retenido_a_Empleados_poliza_nomina",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150510",
			          "cuenta_contable" => "I.V.A.  4% Retenido por Fletes",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150515",
			          "cuenta_contable" => "I.S.R. Por Asimilables a Salarios",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150520",
			          "cuenta_contable" => "I.M.S.S. Ret. a Empleados",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.11",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150525",
			          "cuenta_contable" => "INFONAVIT Ret. a Empleados",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.12",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150530",
			          "cuenta_contable" => "I.S.R. Ret. por Honorarios",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150535",
			          "cuenta_contable" => "I.V.A. Ret. por Honorarios",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.10",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150540",
			          "cuenta_contable" => "I.S.R. Ret. por Arredamiento",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150545",
			          "cuenta_contable" => "I.V.A. Ret. por  Arrendamiento",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.10",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150550",
			          "cuenta_contable" => "Retenciones de ISR por Autofacturacion",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.12",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150555",
			          "cuenta_contable" => "1% Impuesto Cedular Honorarios",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.12",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2150560",
			          "cuenta_contable" => "1% Impuesto Cedular Arrendamiento",
			          "subcuenta" => "215-05",
			          "cod_sat" => "216.12",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215-10",
			          "cuenta_contable" => "Contribuciones Seguridad Social por Pagar",
			          "subcuenta" => "215",
			          "cod_sat" => "211.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151005",
			          "cuenta_contable" => "I.M.S.S. Cuota Patronal",
			          "subcuenta" => "215-10",
			          "cod_sat" => "211.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151010",
			          "cuenta_contable" => "R.C.V. (S.A.R.)",
			          "subcuenta" => "215-10",
			          "cod_sat" => "211.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151015",
			          "cuenta_contable" => "INFONAVIT",
			          "subcuenta" => "215-10",
			          "cod_sat" => "211.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215-15",
			          "cuenta_contable" => "Impuestos Estatales por Pagar",
			          "subcuenta" => "215",
			          "cod_sat" => "212.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151505",
			          "cuenta_contable" => "Impuesto S / Nominas",
			          "subcuenta" => "215-15",
			          "cod_sat" => "212.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151510",
			          "cuenta_contable" => "Impuesto S / Honorarios",
			          "subcuenta" => "215-15",
			          "cod_sat" => "213.07",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151515",
			          "cuenta_contable" => "1% Impuesto Cedular Honorarios",
			          "subcuenta" => "215-15",
			          "cod_sat" => "213.07",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151520",
			          "cuenta_contable" => "1% Impuesto Cedular Arrendamiento",
			          "subcuenta" => "215-15",
			          "cod_sat" => "213.07",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151525",
			          "cuenta_contable" => "Impuesto Cedular 1%  Hono Cobrado",
			          "subcuenta" => "215-15",
			          "cod_sat" => "213.07",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2151530",
			          "cuenta_contable" => "Impuesto Cedular 1% Arre Cobrado",
			          "subcuenta" => "215-15",
			          "cod_sat" => "213.07",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215-20",
			          "cuenta_contable" => "Impuestos Federales por Pagar",
			          "subcuenta" => "215",
			          "cod_sat" => "213.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2152005",
			          "cuenta_contable" => "I.V.A por Pagar",
			          "subcuenta" => "215-20",
			          "cod_sat" => "213.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2152010",
			          "cuenta_contable" => "I.E.P.S. por Pagar",
			          "subcuenta" => "215-20",
			          "cod_sat" => "213.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2152015",
			          "cuenta_contable" => "I.S.R. por Pagar",
			          "subcuenta" => "215-20",
			          "cod_sat" => "213.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2152020",
			          "cuenta_contable" => "I.E.T.U. por Pagar",
			          "subcuenta" => "215-20",
			          "cod_sat" => "213.07",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215-25",
			          "cuenta_contable" => "P.T.U. por Pagar",
			          "subcuenta" => "215",
			          "cod_sat" => "215.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2152505",
			          "cuenta_contable" => "P.T.U. por Pagar",
			          "subcuenta" => "215-25",
			          "cod_sat" => "215.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2152510",
			          "cuenta_contable" => "PTU por pagar de ejercicios anteriores",
			          "subcuenta" => "215-25",
			          "cod_sat" => "215.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2152515",
			          "cuenta_contable" => "Provisión de PTU por pagar",
			          "subcuenta" => "215-25",
			          "cod_sat" => "215.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215-30",
			          "cuenta_contable" => "IVA Trasladado",
			          "subcuenta" => "215",
			          "cod_sat" => "209.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153005",
			          "cuenta_contable" => "I.V.A. 16%",
			          "subcuenta" => "215-30",
			          "cod_sat" => "209.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153010",
			          "cuenta_contable" => "I.V.A. 0%",
			          "subcuenta" => "215-30",
			          "cod_sat" => "209.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153015",
			          "cuenta_contable" => "Exento de IVA",
			          "subcuenta" => "215-30",
			          "cod_sat" => "209.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "215-35",
			          "cuenta_contable" => "IVA Trasladado y Retenciones Fiscales",
			          "subcuenta" => "215",
			          "cod_sat" => "208.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153505",
			          "cuenta_contable" => "I.V.A. 16% Trasladado por  Ventas Cobradas",
			          "subcuenta" => "215-35",
			          "cod_sat" => "208.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153510",
			          "cuenta_contable" => "I.V.A. 0%",
			          "subcuenta" => "215-35",
			          "cod_sat" => "208.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153515",
			          "cuenta_contable" => "Exento de IVA",
			          "subcuenta" => "215-35",
			          "cod_sat" => "208.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153520",
			          "cuenta_contable" => "I.V.A. Retenido por Fletes",
			          "subcuenta" => "215-35",
			          "cod_sat" => "216.10",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153525",
			          "cuenta_contable" => "I.S.R. Retenido por Honorarios",
			          "subcuenta" => "215-35",
			          "cod_sat" => "216.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153530",
			          "cuenta_contable" => "I.S.R. Retenido por Arrendamiento",
			          "subcuenta" => "215-35",
			          "cod_sat" => "216.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153535",
			          "cuenta_contable" => "I.V.A. Retenido por Honorarios",
			          "subcuenta" => "215-35",
			          "cod_sat" => "216.10",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153540",
			          "cuenta_contable" => "I.V.A. Retenido por Arrendamiento",
			          "subcuenta" => "215-35",
			          "cod_sat" => "216.10",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2153545",
			          "cuenta_contable" => "I.S.R. Ret. a Empleados Pagado",
			          "subcuenta" => "215-35",
			          "cod_sat" => "216.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Bancos_ISR_Retenido_a_Empleados_poliza_nominas_traslado",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "216",
			          "cuenta_contable" => "Beneficios a Empleados por Pagar",
			          "subcuenta" => "21",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "21605",
			          "cuenta_contable" => "Relaciones Laborales por Pagar",
			          "subcuenta" => "216",
			          "cod_sat" => "210.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2160501",
			          "cuenta_contable" => "Nomina por Pagar",
			          "subcuenta" => "21605",
			          "cod_sat" => "210.07",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "Pago_Nomina",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2160502",
			          "cuenta_contable" => "Comisiones por Pagar",
			          "subcuenta" => "21605",
			          "cod_sat" => "210.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2160503",
			          "cuenta_contable" => "Aguinaldo por Pagar",
			          "subcuenta" => "21605",
			          "cod_sat" => "210.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2160504",
			          "cuenta_contable" => "Fondo de Ahorro",
			          "subcuenta" => "21605",
			          "cod_sat" => "210.05",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2160505",
			          "cuenta_contable" => "Asimilables a Salarios pro Pagar",
			          "subcuenta" => "21605",
			          "cod_sat" => "210.06",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2160506",
			          "cuenta_contable" => "Anticipos y Reamanentes por Pagar",
			          "subcuenta" => "21605",
			          "cod_sat" => "",
			          "tipo" => "",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "217",
			          "cuenta_contable" => "Dividendos por Pagar",
			          "subcuenta" => "21",
			          "cod_sat" => "214.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "217-05",
			          "cuenta_contable" => "Dividendos por Pagar",
			          "subcuenta" => "217",
			          "cod_sat" => "214.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2170505",
			          "cuenta_contable" => "Socio X",
			          "subcuenta" => "217-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "22",
			          "cuenta_contable" => "PASIVOS NO CIRCULANTES",
			          "subcuenta" => "2",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "250",
			          "cuenta_contable" => "Documentos y Préstamos Bancarios a Largo Plazo",
			          "subcuenta" => "22",
			          "cod_sat" => "252.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "250-05",
			          "cuenta_contable" => "Documentos bancarios y financieros por pagar a largo plazo nacional",
			          "subcuenta" => "250",
			          "cod_sat" => "252.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "2500505",
			          "cuenta_contable" => "Documento Núm. X",
			          "subcuenta" => "250-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3",
			          "cuenta_contable" => "PATRIMONIO / CAPITAL",
			          "subcuenta" => "",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Título",
			          "nivel" => "1",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "31",
			          "cuenta_contable" => "CAPITAL",
			          "subcuenta" => "3",
			          "cod_sat" => "300.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "310",
			          "cuenta_contable" => "Capital Social o Patrimonio",
			          "subcuenta" => "31",
			          "cod_sat" => "301.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "31010",
			          "cuenta_contable" => "Capital Social",
			          "subcuenta" => "310",
			          "cod_sat" => "",
			          "tipo" => "",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3101005",
			          "cuenta_contable" => "Capital Social Fijo Pagado",
			          "subcuenta" => "31010",
			          "cod_sat" => "301.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3101010",
			          "cuenta_contable" => "Capital Social Fijo NO Pagado",
			          "subcuenta" => "31010",
			          "cod_sat" => "301.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3101015",
			          "cuenta_contable" => "Capital Variable",
			          "subcuenta" => "31010",
			          "cod_sat" => "301.02",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3101020",
			          "cuenta_contable" => "Aportaciones para futuros aumentos de capital",
			          "subcuenta" => "31010",
			          "cod_sat" => "301.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3101025",
			          "cuenta_contable" => "Prima en suscripción de acciones",
			          "subcuenta" => "31010",
			          "cod_sat" => "301.04",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3101030",
			          "cuenta_contable" => "Prima en suscripción de partes sociales",
			          "subcuenta" => "31010",
			          "cod_sat" => "301.05",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "320",
			          "cuenta_contable" => "Utilidades Restringidas",
			          "subcuenta" => "31",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "320-05",
			          "cuenta_contable" => "Reserva Legal",
			          "subcuenta" => "320",
			          "cod_sat" => "303.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3200505",
			          "cuenta_contable" => "Reserva Legal",
			          "subcuenta" => "320-05",
			          "cod_sat" => "303.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325",
			          "cuenta_contable" => "Resultados Acumulados",
			          "subcuenta" => "31",
			          "cod_sat" => "304.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325-05",
			          "cuenta_contable" => "Utilidades por Distribuir",
			          "subcuenta" => "325",
			          "cod_sat" => "304.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3250505",
			          "cuenta_contable" => "Utilidades de Ejercicios Antreriores",
			          "subcuenta" => "325-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325050505",
			          "cuenta_contable" => "Utilidades Ejercicios Anteriores",
			          "subcuenta" => "3250505",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "Cuenta_de_Arrastre_Cierre_Anterior_Utilidad",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325050510",
			          "cuenta_contable" => "Utilidades Acumuladas al 2012",
			          "subcuenta" => "3250505",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325050515",
			          "cuenta_contable" => "Utilidades Generadas en 2013",
			          "subcuenta" => "3250505",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325050520",
			          "cuenta_contable" => "Utilidades Generadas en 2014",
			          "subcuenta" => "3250505",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325-10",
			          "cuenta_contable" => "Superávit Realizado",
			          "subcuenta" => "325",
			          "cod_sat" => "304.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3251005",
			          "cuenta_contable" => "Superávit Realizado",
			          "subcuenta" => "325-10",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325-15",
			          "cuenta_contable" => "Utilidades del Ejercicio en Curso",
			          "subcuenta" => "325",
			          "cod_sat" => "305.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3251505",
			          "cuenta_contable" => "Utilidades del Ejercicio en Curso",
			          "subcuenta" => "325-15",
			          "cod_sat" => "305.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Cuenta_de_Cierre_Utilidad",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325-20",
			          "cuenta_contable" => "Deficit Acumulado",
			          "subcuenta" => "325",
			          "cod_sat" => "304.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3252005",
			          "cuenta_contable" => "Pérdidas de Ejercicios Antreriores",
			          "subcuenta" => "325-20",
			          "cod_sat" => "304.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Cuenta_de_Arrastre_Cierre_Anterior_Perdida",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325200505",
			          "cuenta_contable" => "Pérdidas Acumuladas al 2011",
			          "subcuenta" => "3252005",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325200510",
			          "cuenta_contable" => "Pérdidas Generadas en el Ejerccio 2012",
			          "subcuenta" => "3252005",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325200515",
			          "cuenta_contable" => "Pérdidas Generadas en el Ejercicio 2013",
			          "subcuenta" => "3252005",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325200520",
			          "cuenta_contable" => "Pérdidas Generadas en el Ejercicio 2014",
			          "subcuenta" => "3252005",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubCuenta",
			          "nivel" => "6",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "325-30",
			          "cuenta_contable" => "Pérdida del Ejercicio en Curso",
			          "subcuenta" => "325",
			          "cod_sat" => "305.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "3253005",
			          "cuenta_contable" => "Pérdida del Ejercicio en Curso",
			          "subcuenta" => "325-30",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Cuenta_de_Cierre_Perdida",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4",
			          "cuenta_contable" => "INGRESOS",
			          "subcuenta" => "",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Título",
			          "nivel" => "1",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "41",
			          "cuenta_contable" => "INGRESOS POR OPERACIONES CONTINUAS",
			          "subcuenta" => "4",
			          "cod_sat" => "400.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "410",
			          "cuenta_contable" => "Venta de Bienes y Servicios",
			          "subcuenta" => "41",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "410-05",
			          "cuenta_contable" => "Bienes y Productos 16%",
			          "subcuenta" => "410",
			          "cod_sat" => "401.03",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4100505",
			          "cuenta_contable" => "Bienes y Productos 16%",
			          "subcuenta" => "410-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "410-10",
			          "cuenta_contable" => "Bienes y Productos 0%",
			          "subcuenta" => "410",
			          "cod_sat" => "401.06",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4101005",
			          "cuenta_contable" => "Bienes y Productos 0%",
			          "subcuenta" => "410-10",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "410-15",
			          "cuenta_contable" => "Bienes y Productos Exentos",
			          "subcuenta" => "410",
			          "cod_sat" => "401.09",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4101505",
			          "cuenta_contable" => "Bienes y Productos Exentos",
			          "subcuenta" => "410-15",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "415",
			          "cuenta_contable" => "Venta de Bienes y Servicios Partes Relacionadas Nacionales",
			          "subcuenta" => "41",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "415-05",
			          "cuenta_contable" => "Bienes y Servicios 16% Partes Relacionadas Nacionales",
			          "subcuenta" => "415",
			          "cod_sat" => "401.10",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4150505",
			          "cuenta_contable" => "Bienes y Servicios 16%  Partes Relacionadas Nacionales ",
			          "subcuenta" => "415-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "420",
			          "cuenta_contable" => "Venta de Bienes y Servicios Partes Relacionadas Extranjeras ",
			          "subcuenta" => "41",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "420-05",
			          "cuenta_contable" => "Bienes y Servicios 16% Partes Relacionadas Extranjeras",
			          "subcuenta" => "420",
			          "cod_sat" => "401.11",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4200505",
			          "cuenta_contable" => "Bienes y Servicios 16%  Partes Relacionadas Extranjeras ",
			          "subcuenta" => "420-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "470",
			          "cuenta_contable" => "Descuentos, Devoluciones y Rebajas Sobre Ventas ",
			          "subcuenta" => "41",
			          "cod_sat" => "402.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "470-05",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Ventas 16%",
			          "subcuenta" => "470",
			          "cod_sat" => "402.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4700505",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Ventas 16% ",
			          "subcuenta" => "470-05",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Descuento_en_Ingresos_Principal",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "470-10",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Ventas 0%",
			          "subcuenta" => "470",
			          "cod_sat" => "402.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4701005",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Ventas 0% ",
			          "subcuenta" => "470-10",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "470-15",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Ventas Exentas",
			          "subcuenta" => "470",
			          "cod_sat" => "402.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4701505",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Ventas Exentas ",
			          "subcuenta" => "470-15",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "470-20",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Otros Ingresos",
			          "subcuenta" => "470",
			          "cod_sat" => "402.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4702005",
			          "cuenta_contable" => "Desc., Dev. y Reb. S/Otros Ingresos",
			          "subcuenta" => "470-20",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "480",
			          "cuenta_contable" => "Ingresos de no Operación",
			          "subcuenta" => "41",
			          "cod_sat" => "403.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "480-05",
			          "cuenta_contable" => "Intereses Ganados",
			          "subcuenta" => "480",
			          "cod_sat" => "403.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4800505",
			          "cuenta_contable" => "Intereses Ganados ",
			          "subcuenta" => "480-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "480-10",
			          "cuenta_contable" => "Utilidad por Venta de Activos Fijos",
			          "subcuenta" => "480",
			          "cod_sat" => "403.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4801005",
			          "cuenta_contable" => "Utilidad por Venta de Activos Fijos ",
			          "subcuenta" => "480-10",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "480-15",
			          "cuenta_contable" => "Otros Ingresos",
			          "subcuenta" => "480",
			          "cod_sat" => "403.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4801505",
			          "cuenta_contable" => "Otros Ingresos ",
			          "subcuenta" => "480-15",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4801510",
			          "cuenta_contable" => "Ajuste a Pesos ",
			          "subcuenta" => "480-15",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Ajuste_a_Peso_en_Ingresos_DZ",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "4801515",
			          "cuenta_contable" => "Utilidad Cambiaria ",
			          "subcuenta" => "480-15",
			          "cod_sat" => "702.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Utilidad_Cambiaria",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5",
			          "cuenta_contable" => "EGRESOS",
			          "subcuenta" => "",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Título",
			          "nivel" => "1",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "51",
			          "cuenta_contable" => "COMPRAS Y COSTOS",
			          "subcuenta" => "5",
			          "cod_sat" => "500.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "510",
			          "cuenta_contable" => "Costo de Ventas por Bienes",
			          "subcuenta" => "51",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "510-05",
			          "cuenta_contable" => "Costo de Bienes y Productos 16%",
			          "subcuenta" => "510",
			          "cod_sat" => "501.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5110505",
			          "cuenta_contable" => "Costo de Bienes y Productos 16%",
			          "subcuenta" => "510-05",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "510-10",
			          "cuenta_contable" => "Costo de  Bienes y Productos 0%",
			          "subcuenta" => "510",
			          "cod_sat" => "501.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5101005",
			          "cuenta_contable" => "Costo de  Bienes y Productos 0%",
			          "subcuenta" => "510-10",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "510-15",
			          "cuenta_contable" => "Costo de Bienes y Productos Exentos",
			          "subcuenta" => "510",
			          "cod_sat" => "501.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5101505",
			          "cuenta_contable" => "Costo de Bienes y Productos Exentos",
			          "subcuenta" => "510-15",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "515",
			          "cuenta_contable" => "Costo de Ventas por Servicios",
			          "subcuenta" => "51",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "515-05",
			          "cuenta_contable" => "Costo de Servicios 16%",
			          "subcuenta" => "515",
			          "cod_sat" => "501.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5150501",
			          "cuenta_contable" => "Costo de Servicios 16%",
			          "subcuenta" => "515-05",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "515-10",
			          "cuenta_contable" => "Costo de  Servicios 0%",
			          "subcuenta" => "515",
			          "cod_sat" => "501.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5151001",
			          "cuenta_contable" => "Costo de  Servicios 0%",
			          "subcuenta" => "515-10",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "515-15",
			          "cuenta_contable" => "Costo de Servicios Exentos",
			          "subcuenta" => "515",
			          "cod_sat" => "501.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5151501",
			          "cuenta_contable" => "Costo de Servicios Exentos",
			          "subcuenta" => "515-15",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "520",
			          "cuenta_contable" => "Compra de Mercancías Nacionales",
			          "subcuenta" => "51",
			          "cod_sat" => "502.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "520-05",
			          "cuenta_contable" => "Compras Nacionales 16%",
			          "subcuenta" => "520",
			          "cod_sat" => "502.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5200505",
			          "cuenta_contable" => "Compras Nacionales 16%",
			          "subcuenta" => "520-05",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "520-10",
			          "cuenta_contable" => "Compras Nacionales 0%",
			          "subcuenta" => "520",
			          "cod_sat" => "502.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5201005",
			          "cuenta_contable" => "Compras Nacionales 0%",
			          "subcuenta" => "520-10",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "520-15",
			          "cuenta_contable" => "Compras Nacionales Exentas",
			          "subcuenta" => "520",
			          "cod_sat" => "502.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5201505",
			          "cuenta_contable" => "Compras Nacionales Exentas",
			          "subcuenta" => "520-15",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "525",
			          "cuenta_contable" => "Compra de Mercancías Nacionales Parte Relacionada",
			          "subcuenta" => "51",
			          "cod_sat" => "502.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "525-05",
			          "cuenta_contable" => "Compras Nacionales 16% Parte Relacionada",
			          "subcuenta" => "525",
			          "cod_sat" => "502.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5250505",
			          "cuenta_contable" => "Compras Nacionales 16% Parte Relacionada ",
			          "subcuenta" => "525-05",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "525-10",
			          "cuenta_contable" => "Compras Nacionales 0% Parte Relacionada",
			          "subcuenta" => "525",
			          "cod_sat" => "502.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5251005",
			          "cuenta_contable" => "Compras Nacionales 0% Parte Relacionada",
			          "subcuenta" => "525-10",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "525-15",
			          "cuenta_contable" => "Compras Nacionales Exentas Parte Relacionada",
			          "subcuenta" => "525",
			          "cod_sat" => "502.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5251505",
			          "cuenta_contable" => "Compras Nacionales Exentas Parte Relacionada ",
			          "subcuenta" => "525-15",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "530",
			          "cuenta_contable" => "Compra de Mercancías al Extranjero",
			          "subcuenta" => "51",
			          "cod_sat" => "502.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "530-05",
			          "cuenta_contable" => "Compras al Extranjero 16%",
			          "subcuenta" => "530",
			          "cod_sat" => "502.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5300505",
			          "cuenta_contable" => "Compras al Extranjero 16%",
			          "subcuenta" => "530-05",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "530-10",
			          "cuenta_contable" => "Compras al Extranjero 0%",
			          "subcuenta" => "530",
			          "cod_sat" => "502.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5301005",
			          "cuenta_contable" => "Compras al Extranjero 0%",
			          "subcuenta" => "530-10",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "530-15",
			          "cuenta_contable" => "Compras al Extranjero Exentas",
			          "subcuenta" => "530",
			          "cod_sat" => "502.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5301505",
			          "cuenta_contable" => "Compras al Extranjero Exentas",
			          "subcuenta" => "530-15",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "535",
			          "cuenta_contable" => "Compra de Mercancías al Extranjero Parte Relacionada ",
			          "subcuenta" => "51",
			          "cod_sat" => "502.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "535-05",
			          "cuenta_contable" => "Compras al Extranjero 16% al Extranjero Parte Relacionada",
			          "subcuenta" => "535",
			          "cod_sat" => "502.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5350505",
			          "cuenta_contable" => "Compras al Extranjero 16% al Extranjero Parte Relacionada ",
			          "subcuenta" => "535-05",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "535-10",
			          "cuenta_contable" => "Compras al Extranjero 0% al Extranjero Parte Relacionada",
			          "subcuenta" => "535",
			          "cod_sat" => "502.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5351005",
			          "cuenta_contable" => "Compras al Extranjero 0% al Extranjero Parte Relacionada ",
			          "subcuenta" => "535-10",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "535-15",
			          "cuenta_contable" => "Compras al Extranjero Exentas al Extranjero Parte Relacionada",
			          "subcuenta" => "535",
			          "cod_sat" => "502.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5351505",
			          "cuenta_contable" => "Compras al Extranjero Exentas al Extranjero Parte Relacionada ",
			          "subcuenta" => "535-15",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "580",
			          "cuenta_contable" => "Descuentos, Devoluciones y Rebajas  Sobre Compras",
			          "subcuenta" => "51",
			          "cod_sat" => "503.00",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "580-05",
			          "cuenta_contable" => "Descuentos y Rebajas Sobre Compras 16%",
			          "subcuenta" => "580",
			          "cod_sat" => "503.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5800505",
			          "cuenta_contable" => "Descuentos y Rebajas Sobre Compras 16%",
			          "subcuenta" => "580-05",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Descuento_en_Egreso_Prinicpal",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "580-10",
			          "cuenta_contable" => "Descuentos y Rebajas Sobre Compras 0%",
			          "subcuenta" => "580",
			          "cod_sat" => "503.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5801005",
			          "cuenta_contable" => "Descuentos y Rebajas Sobre Compras 0%",
			          "subcuenta" => "580-10",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "580-15",
			          "cuenta_contable" => "Descuentos y Rebajas Sobre Compras Exentas",
			          "subcuenta" => "580",
			          "cod_sat" => "503.01",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "5801505",
			          "cuenta_contable" => "Descuentos y Rebajas Sobre Compras Exentas",
			          "subcuenta" => "580-15",
			          "cod_sat" => "",
			          "tipo" => "Haber",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "61",
			          "cuenta_contable" => "GASTOS Y EGRESOS DE OPERACIÓN",
			          "subcuenta" => "5",
			          "cod_sat" => "600.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650",
			          "cuenta_contable" => "Gastos de Generales",
			          "subcuenta" => "61",
			          "cod_sat" => "601.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-03",
			          "cuenta_contable" => "Sueldos y Salarios",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500303",
			          "cuenta_contable" => "Sueldos, Salarios Rayas y Jornales",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500306",
			          "cuenta_contable" => "Sueldos y Salarios Exentos",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500309",
			          "cuenta_contable" => "Aguinaldo Gravado",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.12",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500312",
			          "cuenta_contable" => "Aguinaldo Exento",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.12",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500315",
			          "cuenta_contable" => "Asistencia",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500318",
			          "cuenta_contable" => "Puntualidad",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500321",
			          "cuenta_contable" => "Despensa",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.15",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500324",
			          "cuenta_contable" => "Comisiones",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.74",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500327",
			          "cuenta_contable" => "Horas Extra Doble - Gravado",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500330",
			          "cuenta_contable" => "Horas Extra Doble - Exento",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500333",
			          "cuenta_contable" => "Horas Extra Triple - Exento",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500336",
			          "cuenta_contable" => "Horas Extra Triple - Gravado",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500339",
			          "cuenta_contable" => "Finiquitos",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.13",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500342",
			          "cuenta_contable" => "Despidos y Liquidaciones",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.13",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500345",
			          "cuenta_contable" => "Indemnizaciones",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.13",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500348",
			          "cuenta_contable" => "Otros Ingresos por Salarios",
			          "subcuenta" => "650-03",
			          "cod_sat" => "601.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-06",
			          "cuenta_contable" => "Prestaciones a Empleados",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500603",
			          "cuenta_contable" => "Vacaciones",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.06",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500606",
			          "cuenta_contable" => "Prima Vacacional",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.07",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500609",
			          "cuenta_contable" => "Prima Dominical",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.08",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500612",
			          "cuenta_contable" => "Fondo de Ahorro",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.19",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500615",
			          "cuenta_contable" => "Cuotas Sindicales",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.20",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500618",
			          "cuenta_contable" => "I.M.S.S. Patronal",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.26",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500621",
			          "cuenta_contable" => "R.C.V.  (SAR)",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.28",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500624",
			          "cuenta_contable" => "Infonavit",
			          "subcuenta" => "650-06",
			          "cod_sat" => "601.27",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-09",
			          "cuenta_contable" => "Participación de trabajadores en Utilidades",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6500903",
			          "cuenta_contable" => "P.T.U.",
			          "subcuenta" => "650-09",
			          "cod_sat" => "601.21",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-12",
			          "cuenta_contable" => "Servicios Personales Externos",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501203",
			          "cuenta_contable" => "Asimilables a Salarios",
			          "subcuenta" => "650-12",
			          "cod_sat" => "601.31",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501206",
			          "cuenta_contable" => "Apoyo a Practicantes y Becarios",
			          "subcuenta" => "650-12",
			          "cod_sat" => "601.31",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-15",
			          "cuenta_contable" => "Impuestos y Derechos",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501503",
			          "cuenta_contable" => "Impuesto S / Nominas",
			          "subcuenta" => "650-15",
			          "cod_sat" => "601.29",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501506",
			          "cuenta_contable" => "Impuesto S / Honorarios",
			          "subcuenta" => "650-15",
			          "cod_sat" => "601.30",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501509",
			          "cuenta_contable" => "Predial",
			          "subcuenta" => "650-15",
			          "cod_sat" => "601.78",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501512",
			          "cuenta_contable" => "Impuestos y Derechos Varios",
			          "subcuenta" => "650-15",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-18",
			          "cuenta_contable" => "Regalías",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501803",
			          "cuenta_contable" => "Regalías Sujetas a Otro Porcentaje",
			          "subcuenta" => "650-18",
			          "cod_sat" => "601.65",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501806",
			          "cuenta_contable" => "Regalías Sujetas al 5%",
			          "subcuenta" => "650-18",
			          "cod_sat" => "601.66",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501809",
			          "cuenta_contable" => "Regalías Sujetas al 10%",
			          "subcuenta" => "650-18",
			          "cod_sat" => "601.67",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501812",
			          "cuenta_contable" => "Regalías Sujetas al 15%",
			          "subcuenta" => "650-18",
			          "cod_sat" => "601.68",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501815",
			          "cuenta_contable" => "Regalías sujetas al 25%",
			          "subcuenta" => "650-18",
			          "cod_sat" => "601.69",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501818",
			          "cuenta_contable" => "Regalías sujetas al 30%",
			          "subcuenta" => "650-18",
			          "cod_sat" => "601.70",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6501821",
			          "cuenta_contable" => "Regalías sin Retención",
			          "subcuenta" => "650-18",
			          "cod_sat" => "601.71",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-21",
			          "cuenta_contable" => "Impuestos en Importaciones",
			          "subcuenta" => "650",
			          "cod_sat" => "601.73",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6502103",
			          "cuenta_contable" => "D.T.A. en Importaciones",
			          "subcuenta" => "650-21",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6502106",
			          "cuenta_contable" => "I.G.I. Importaciones",
			          "subcuenta" => "650-21",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-24",
			          "cuenta_contable" => "Patentes y Marcas",
			          "subcuenta" => "650",
			          "cod_sat" => "601.76",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6502403",
			          "cuenta_contable" => "Patentes",
			          "subcuenta" => "650-24",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6502406",
			          "cuenta_contable" => "Marcas",
			          "subcuenta" => "650-24",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-27",
			          "cuenta_contable" => "Comisiones Sobre Ventas",
			          "subcuenta" => "650",
			          "cod_sat" => "601.74",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6502703",
			          "cuenta_contable" => "Comisiones Sobre Ventas",
			          "subcuenta" => "650-27",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-30",
			          "cuenta_contable" => "Gastos Asociados a la Producción",
			          "subcuenta" => "650",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503003",
			          "cuenta_contable" => "Materias Primas Menores",
			          "subcuenta" => "650-30",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503006",
			          "cuenta_contable" => "Materiales Auxiliares",
			          "subcuenta" => "650-30",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-33",
			          "cuenta_contable" => "Sistemas y Tecnología",
			          "subcuenta" => "650",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503303",
			          "cuenta_contable" => "Software",
			          "subcuenta" => "650-33",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503306",
			          "cuenta_contable" => "Licencias",
			          "subcuenta" => "650-33",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503309",
			          "cuenta_contable" => "Pagina WEB",
			          "subcuenta" => "650-33",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503312",
			          "cuenta_contable" => "Administración de Redes Sociales",
			          "subcuenta" => "650-33",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-36",
			          "cuenta_contable" => "Arrendamientos Varios",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503603",
			          "cuenta_contable" => "Arrendamiento de Oficinas",
			          "subcuenta" => "650-36",
			          "cod_sat" => "601.45",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503606",
			          "cuenta_contable" => "Arrendamiento de Vehículos",
			          "subcuenta" => "650-36",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503609",
			          "cuenta_contable" => "Arrendamiento de Fotocopiadoras",
			          "subcuenta" => "650-36",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-39",
			          "cuenta_contable" => "Servicios Generales",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503903",
			          "cuenta_contable" => "Agua y Drenaje",
			          "subcuenta" => "650-39",
			          "cod_sat" => "601.51",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503906",
			          "cuenta_contable" => "Electricidad",
			          "subcuenta" => "650-39",
			          "cod_sat" => "601.52",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6503909",
			          "cuenta_contable" => "Gas",
			          "subcuenta" => "650-39",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-42",
			          "cuenta_contable" => "Servicios de Comunicación",
			          "subcuenta" => "650",
			          "cod_sat" => "601.50",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504203",
			          "cuenta_contable" => "Teléfono",
			          "subcuenta" => "650-42",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504206",
			          "cuenta_contable" => "Nextel",
			          "subcuenta" => "650-42",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504209",
			          "cuenta_contable" => "Internet",
			          "subcuenta" => "650-42",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-45",
			          "cuenta_contable" => "Mantenimientos Generales",
			          "subcuenta" => "650",
			          "cod_sat" => "601.56",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504503",
			          "cuenta_contable" => "Mantenimiento de Edificios",
			          "subcuenta" => "650-45",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504506",
			          "cuenta_contable" => "Mantenimiento de Equipo de Oficina",
			          "subcuenta" => "650-45",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504509",
			          "cuenta_contable" => "Mantenimiento de EQ. de Transporte",
			          "subcuenta" => "650-45",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504512",
			          "cuenta_contable" => "Mantenimiento de  EQ. de Computo",
			          "subcuenta" => "650-45",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504515",
			          "cuenta_contable" => "Mantenimiento de Equipo de Producción",
			          "subcuenta" => "650-45",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504518",
			          "cuenta_contable" => "Mantenimiento de Otros",
			          "subcuenta" => "650-45",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-48",
			          "cuenta_contable" => "Papelería y Útiles",
			          "subcuenta" => "650",
			          "cod_sat" => "601.55",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504803",
			          "cuenta_contable" => "Papelería y Artículos de Escritorio",
			          "subcuenta" => "650-48",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6504806",
			          "cuenta_contable" => "Equipo Menor de Oficina",
			          "subcuenta" => "650-48",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-51",
			          "cuenta_contable" => "Gasolinas y Lubricantes",
			          "subcuenta" => "650",
			          "cod_sat" => "601.48",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505103",
			          "cuenta_contable" => "Magna",
			          "subcuenta" => "650-51",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505106",
			          "cuenta_contable" => "Premium",
			          "subcuenta" => "650-51",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505109",
			          "cuenta_contable" => "Diésel",
			          "subcuenta" => "650-51",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505112",
			          "cuenta_contable" => "Lubricantes",
			          "subcuenta" => "650-51",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-54",
			          "cuenta_contable" => "Viáticos",
			          "subcuenta" => "650",
			          "cod_sat" => "601.49",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505403",
			          "cuenta_contable" => "Pasajes Terrestres",
			          "subcuenta" => "650-54",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505406",
			          "cuenta_contable" => "Pasajes Aéreos",
			          "subcuenta" => "650-54",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505409",
			          "cuenta_contable" => "Casetas y Pistas",
			          "subcuenta" => "650-54",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505412",
			          "cuenta_contable" => "Combustibles",
			          "subcuenta" => "650-54",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505415",
			          "cuenta_contable" => "Hospedaje",
			          "subcuenta" => "650-54",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505418",
			          "cuenta_contable" => "Alimentos",
			          "subcuenta" => "650-54",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505421",
			          "cuenta_contable" => "Otros Viáticos",
			          "subcuenta" => "650-54",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-57",
			          "cuenta_contable" => "Otros Costos y Gastos Generales",
			          "subcuenta" => "650",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505703",
			          "cuenta_contable" => "Alarmas",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.53",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505706",
			          "cuenta_contable" => "Artículos de Limpieza",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.54",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505709",
			          "cuenta_contable" => "Atención a Clientes",
			          "subcuenta" => "650-57",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505712",
			          "cuenta_contable" => "Atención a Empleados",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505715",
			          "cuenta_contable" => "Botiquín",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505718",
			          "cuenta_contable" => "Cuotas y Subscripciones",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.60",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505721",
			          "cuenta_contable" => "Capacitación al Personal",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.62",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505724",
			          "cuenta_contable" => "Gastos Diversos",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505727",
			          "cuenta_contable" => "Donativos a  Autorizadas",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.63",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505730",
			          "cuenta_contable" => "Donativos a No Autorizadas",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.63",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505733",
			          "cuenta_contable" => "Facturas Fiscales CFDI",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505736",
			          "cuenta_contable" => "Fletes y Acarreos",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.72",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505739",
			          "cuenta_contable" => "Fotocopiado",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505742",
			          "cuenta_contable" => "Gastos de Representación",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505745",
			          "cuenta_contable" => "Honorarios Profesionales P Fisica Nacional",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.34",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505748",
			          "cuenta_contable" => "Honorarios Profesionales P Fisica Nac. Parte Relacionada",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.35",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505751",
			          "cuenta_contable" => "Mensajeria y Paqueteria",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505754",
			          "cuenta_contable" => "Placas y Tenencias",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505757",
			          "cuenta_contable" => "Publicidad y Promoción",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.61",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505760",
			          "cuenta_contable" => "Puentes, Peajes y Autopistas",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.84",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505763",
			          "cuenta_contable" => "Recargos",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.59",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505769",
			          "cuenta_contable" => "Uniformes",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.57",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6505772",
			          "cuenta_contable" => "Vigilancia y Limpieza",
			          "subcuenta" => "650-57",
			          "cod_sat" => "601.53",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-60",
			          "cuenta_contable" => "Depreciación de Activos",
			          "subcuenta" => "650",
			          "cod_sat" => "613.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506003",
			          "cuenta_contable" => "Depreciación de Edificios",
			          "subcuenta" => "650-60",
			          "cod_sat" => "613.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Gasto_de_Depreciacion_Edificios",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506006",
			          "cuenta_contable" => "Depreciación de Maquinaria y Equipo",
			          "subcuenta" => "650-60",
			          "cod_sat" => "613.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Gasto_de_Depreciacion_Maquinaria",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506009",
			          "cuenta_contable" => "Depreciación de Equipo de Transporte y Reparto",
			          "subcuenta" => "650-60",
			          "cod_sat" => "613.03",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Gasto_de_Depreciacion_Transporte",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506012",
			          "cuenta_contable" => "Depreciación de Mobiliario y Equipo de Oficina",
			          "subcuenta" => "650-60",
			          "cod_sat" => "613.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Gasto_de_Depreciacion_Oficina",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506015",
			          "cuenta_contable" => "Depreciación de Equipo de Computo",
			          "subcuenta" => "650-60",
			          "cod_sat" => "613.05",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Gasto_de_Depreciacion_Computo",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-63",
			          "cuenta_contable" => "Amortización de Diferidos",
			          "subcuenta" => "650",
			          "cod_sat" => "614.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506303",
			          "cuenta_contable" => "Amortización de Diferidos",
			          "subcuenta" => "650-63",
			          "cod_sat" => "614.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "650-66",
			          "cuenta_contable" => "Gastos no Deducibles",
			          "subcuenta" => "650",
			          "cod_sat" => "601.83",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506503",
			          "cuenta_contable" => "No Cumple Requisitos Fiscales",
			          "subcuenta" => "650-66",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Cuentas_de_Ajustes_de_Egresos_Bancos_XML_No_Cumple",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506506",
			          "cuenta_contable" => "Sin Comprobante",
			          "subcuenta" => "650-66",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Cuentas_de_Ajustes_de_Egresos_Bancos_XML_Sin_Comprobante",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506509",
			          "cuenta_contable" => "Actualizaciones",
			          "subcuenta" => "650-66",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6506512",
			          "cuenta_contable" => "Multas",
			          "subcuenta" => "650-66",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "655",
			          "cuenta_contable" => "Facilidades administrativas fiscales ",
			          "subcuenta" => "61",
			          "cod_sat" => "",
			          "tipo" => "",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "65505",
			          "cuenta_contable" => "Facilidades administrativas fiscales ",
			          "subcuenta" => "655",
			          "cod_sat" => "606.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6550501",
			          "cuenta_contable" => "Facilidades administrativas fiscales ",
			          "subcuenta" => "65505",
			          "cod_sat" => "606.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "65510",
			          "cuenta_contable" => "Participación de los trabajadores en las utilidades ",
			          "subcuenta" => "655",
			          "cod_sat" => "607.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6551001",
			          "cuenta_contable" => "Participación de los trabajadores en las utilidades ",
			          "subcuenta" => "65510",
			          "cod_sat" => "607.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "65515",
			          "cuenta_contable" => "Participación en resultados de subsidiarias ",
			          "subcuenta" => "655",
			          "cod_sat" => "608.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6551501",
			          "cuenta_contable" => "Participación en resultados de subsidiarias ",
			          "subcuenta" => "65515",
			          "cod_sat" => "608.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "65520",
			          "cuenta_contable" => "Participación en resultados de asociadas ",
			          "subcuenta" => "655",
			          "cod_sat" => "609.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6552001",
			          "cuenta_contable" => "Participación en resultados de asociadas ",
			          "subcuenta" => "65520",
			          "cod_sat" => "609.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "65525",
			          "cuenta_contable" => "Participación de los trabajadores en las utilidades diferida ",
			          "subcuenta" => "655",
			          "cod_sat" => "610.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6552501",
			          "cuenta_contable" => "Participación de los trabajadores en las utilidades diferida ",
			          "subcuenta" => "65525",
			          "cod_sat" => "610.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "65530",
			          "cuenta_contable" => "Impuesto Sobre la renta ",
			          "subcuenta" => "655",
			          "cod_sat" => "611.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6553001",
			          "cuenta_contable" => "Impuesto Sobre la renta",
			          "subcuenta" => "65530",
			          "cod_sat" => "611.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6553002",
			          "cuenta_contable" => "Impuesto Sobre la renta por remanente distribuible ",
			          "subcuenta" => "65530",
			          "cod_sat" => "611.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "65535",
			          "cuenta_contable" => "Gastos no deducibles para CUFIN ",
			          "subcuenta" => "655",
			          "cod_sat" => "612.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "6553501",
			          "cuenta_contable" => "Gastos no deducibles para CUFIN ",
			          "subcuenta" => "65535",
			          "cod_sat" => "612.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "71",
			          "cuenta_contable" => "GASTOS DE NO OPERACION",
			          "subcuenta" => "5",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "710",
			          "cuenta_contable" => "Egresos de no Operación",
			          "subcuenta" => "71",
			          "cod_sat" => "700.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "730-03",
			          "cuenta_contable" => "Gastos Financieros",
			          "subcuenta" => "710",
			          "cod_sat" => "701.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "7100303",
			          "cuenta_contable" => "Comisiones Bancarias",
			          "subcuenta" => "730-03",
			          "cod_sat" => "701.10",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "7100306",
			          "cuenta_contable" => "Intereses Bancarios",
			          "subcuenta" => "730-03",
			          "cod_sat" => "701.04",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "7100309",
			          "cuenta_contable" => "Ajuste a Pesos",
			          "subcuenta" => "730-03",
			          "cod_sat" => "701.11",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Ajuste_a_Peso_en_Egresos_DZ",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "7100312",
			          "cuenta_contable" => "Perdida Cambiaria",
			          "subcuenta" => "730-03",
			          "cod_sat" => "701.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "Perdida_Cambiaria",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8",
			          "cuenta_contable" => "CUENTAS DE ORDEN",
			          "subcuenta" => "",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Título",
			          "nivel" => "1",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "81",
			          "cuenta_contable" => "CUENTAS DE ORDEN",
			          "subcuenta" => "8",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "SubTítulo",
			          "nivel" => "2",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810",
			          "cuenta_contable" => "CUENTAS DE ORDEN",
			          "subcuenta" => "81",
			          "cod_sat" => "",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "NIF",
			          "nivel" => "3",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-05",
			          "cuenta_contable" => "UFIN del ejercicio",
			          "subcuenta" => "810",
			          "cod_sat" => "801.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8100505",
			          "cuenta_contable" => "UFIN",
			          "subcuenta" => "810-05",
			          "cod_sat" => "801.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8100510",
			          "cuenta_contable" => "Contra cuenta UFIN",
			          "subcuenta" => "810-05",
			          "cod_sat" => "801.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-10",
			          "cuenta_contable" => "CUFIN del Ejercicio",
			          "subcuenta" => "810",
			          "cod_sat" => "802.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8101005",
			          "cuenta_contable" => "CIFIN",
			          "subcuenta" => "810-10",
			          "cod_sat" => "802.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8101010",
			          "cuenta_contable" => "Contra cuenta CUFIN",
			          "subcuenta" => "810-10",
			          "cod_sat" => "802.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-15",
			          "cuenta_contable" => "CUFIN de ejercicios anteriores",
			          "subcuenta" => "810",
			          "cod_sat" => "803.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8101505",
			          "cuenta_contable" => "CUFIN de ejercicios anteriores",
			          "subcuenta" => "810-15",
			          "cod_sat" => "803.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8101510",
			          "cuenta_contable" => "Contra cuenta CUFIN de ejercicios anteriores",
			          "subcuenta" => "810-15",
			          "cod_sat" => "803.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-20",
			          "cuenta_contable" => "CUFINRE del ejercicio",
			          "subcuenta" => "810",
			          "cod_sat" => "804.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8102005",
			          "cuenta_contable" => "CUFINRE",
			          "subcuenta" => "810-20",
			          "cod_sat" => "804.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8102010",
			          "cuenta_contable" => "Contra cuenta CUFINRE",
			          "subcuenta" => "810-20",
			          "cod_sat" => "804.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-25",
			          "cuenta_contable" => "CUFINRE de ejercicios anteriores",
			          "subcuenta" => "810",
			          "cod_sat" => "805.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8102505",
			          "cuenta_contable" => "CUFINRE de ejercicios anteriores",
			          "subcuenta" => "810-25",
			          "cod_sat" => "805.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8102510",
			          "cuenta_contable" => "Contra cuenta CUFINRE de ejercicios anteriores",
			          "subcuenta" => "810-25",
			          "cod_sat" => "805.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-30",
			          "cuenta_contable" => "CUCA del ejercicio",
			          "subcuenta" => "810",
			          "cod_sat" => "806.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8103005",
			          "cuenta_contable" => "CUCA",
			          "subcuenta" => "810-30",
			          "cod_sat" => "806.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8103010",
			          "cuenta_contable" => "Contra cuenta CUCA",
			          "subcuenta" => "810-30",
			          "cod_sat" => "806.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-35",
			          "cuenta_contable" => "CUCA de ejercicios anteriores",
			          "subcuenta" => "810",
			          "cod_sat" => "807.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8103505",
			          "cuenta_contable" => " CUCA de ejercicios anteriores",
			          "subcuenta" => "810-35",
			          "cod_sat" => "807.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8103510",
			          "cuenta_contable" => "Contra cuenta CUCA de ejercicios anteriores",
			          "subcuenta" => "810-35",
			          "cod_sat" => "807.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-40",
			          "cuenta_contable" => "Ajuste anual por inflación acumulable",
			          "subcuenta" => "810",
			          "cod_sat" => "808.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8104005",
			          "cuenta_contable" => "Ajuste anual por inflación acumulable",
			          "subcuenta" => "810-40",
			          "cod_sat" => "808.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8104010",
			          "cuenta_contable" => "Acumulación del ajuste anual inflacionario",
			          "subcuenta" => "810-40",
			          "cod_sat" => "808.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-45",
			          "cuenta_contable" => "Ajuste anual por inflación deducible",
			          "subcuenta" => "810",
			          "cod_sat" => "809.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8104505",
			          "cuenta_contable" => "Ajuste anual por inflación deducible",
			          "subcuenta" => "810-45",
			          "cod_sat" => "809.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8104510",
			          "cuenta_contable" => "Deducción del ajuste anual inflacionario",
			          "subcuenta" => "810-45",
			          "cod_sat" => "809.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "810-50",
			          "cuenta_contable" => "Deducción de inversión",
			          "subcuenta" => "810",
			          "cod_sat" => "810.00",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Mayor",
			          "nivel" => "4",
			          "acc" => "",
			          "afectable"=> "NO",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8105005",
			          "cuenta_contable" => "Deducción de inversión",
			          "subcuenta" => "810-50",
			          "cod_sat" => "810.01",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));

		\DB::table('360_cat_cuentas_contables')->insert(array(
			          "codigo" =>   "8105010",
			          "cuenta_contable" => "Contra cuenta deducción de inversiones",
			          "subcuenta" => "810-50",
			          "cod_sat" => "810.02",
			          "tipo" => "Debe",
			          "categoria_cuenta" => "Activo",
			          "nivel_detalle" => "Cuenta",
			          "nivel" => "5",
			          "acc" => "",
			          "afectable"=> "SI",
			          "id_empresa" => $data->id
			      ));


			return redirect('/#contabilidad/empresas')->withSuccess('Exito!!, Se ha registrado correctamente');
		}catch(Exception $e){
			return redirect('/#contabilidad/empresas')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
		}
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(!empty ($id)){
			$query = Empresas::find($id);
			return response()->json($query,200);
		}
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!empty($id)){
			$obj= Empresas::find($id);
				return view('app.administrador_app.Empresas.edit',compact('obj'));
		}
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		try{
			$info = $request->all();
			if(!$request->gravados_excentos){
				$info['gravados_excentos'] = '';
			}

			if($request->file('logo_empresa')){				
				$file = $request->file('logo_empresa');
		       	$logo_empresa = $file->getClientOriginalName();
		       	\Storage::disk('logos_empresas')->put($logo_empresa,  \File::get($file));
		       	$info['logo_empresa'] = $logo_empresa;
			}
			$obj = Empresas::find($id);
			$obj->update($info);			
			return response()->json($obj,200);
		}catch(Exception $e){
			return response()->json($e,500);	
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try{	
			$obj = Empresas::find($id);			
			$obj->status = 0;
			$obj->save();
			return response()->json($obj,200);
		}catch(Exception $e){
			return response()->json('Error!!, Se ha presentado un problema, error : '.$e,500);
		}
	}

}
