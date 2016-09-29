<?php namespace App\Http\Controllers\Contabilidad;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Empleados::all()->toJson();
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
			$infoDepartamento = $request->all();	
			$depa = Empleados::create($infoDepartamento);			
			return redirect('/#contabilidad/empleados')->withSuccess('Exito!!, Se ha registrado correctamente');
		}catch(Exception $e){
			return redirect('/#contabilidad/empleados')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$query = Empleados::where('id_empresa','=', $id)->get();
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
			$obj= Empleados::find($id);
				return view('app.administrador_app.empleados.edit',compact('obj'));
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
			$infoDepartamento = $request->all();	
			$depe = Empleados::find($id);
			$depe->update($infoDepartamento);			
			return redirect('/#contabilidad/empleados')->withSuccess('Exito!!, Se ha actualizado correctamente');
		}catch(Exception $e){
			return redirect('/#contabilidad/empleados')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$obj = Empleados::find($id)->delete();			
			return response()->json($obj,200);
		}catch(Exception $e){
			return response()->json('Error!!, Se ha presentado un problema, error : '.$e,500);
		}
	}

	public function info($id)
	{
		if(!empty ($id)){
			$query = Empleados::find($id);
			return response()->json($query,200);
		}
	}

}
