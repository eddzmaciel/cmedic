<?php namespace App\Http\Controllers\Contabilidad;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Proveedores::all()->toJson();
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
			$prov = Proveedores::create($info);			
			return redirect('/#contabilidad/proveedores')->withSuccess('Exito!!, Se ha registrado correctamente');
		}catch(Exception $e){
			return redirect('/#contabilidad/proveedores')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$query = Proveedores::where('id_empresa','=', $id)->get();
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
			$obj= Proveedores::find($id);
				return view('app.administrador_app.Proveedores.edit',compact('obj'));
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
			$prov = Proveedores::find($id);
			$prov->update($info);			
			return response()->json($prov,200);
		}catch(Exception $e){
			return redirect('/#contabilidad/proveedores')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$obj = Proveedores::find($id)->delete();			
			return response()->json($obj,200);
		}catch(Exception $e){
			return response()->json('Error!!, Se ha presentado un problema, error : '.$e,500);
		}
	}

	public function info($id)
	{
		if(!empty ($id)){
			$query = Proveedores::find($id);
			return response()->json($query,200);
		}
	}

}
