<?php namespace App\Http\Controllers\Contabilidad;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
	return Pacientes::all()->toJson();
	
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
			$info = $request->all();	
			$var = Pacientes::create($info);			
			return redirect('/#contabilidad/pacientes')->withSuccess('Exito!!, Se ha registrado correctamente');
		}catch(Exception $e){
			return redirect('/#contabilidad/pacientes')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
	//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
			$var = Pacientes::find($id);
			$var->update($info);			
			return response()->json($var,200);
		}catch(Exception $e){
			return redirect('/#contabilidad/pacientes')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$obj = Pacientes::find($id)->delete();			
			return response()->json($obj,200);
		}catch(Exception $e){
			return response()->json('Error!!, Se ha presentado un problema, error : '.$e,500);
		}
	}

		public function info($id)
		{
			if(!empty ($id)){
				$query = Pacientes::find($id);
				return response()->json($query,200);
				}
		}

}
