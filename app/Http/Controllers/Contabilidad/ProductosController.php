<?php namespace App\Http\Controllers\Contabilidad;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	return Productos::all()->toJson();
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
			$c = Productos::create($info);
			//return response()->json($c,200);			
			return redirect('/#facturacion/productos')->withSuccess('Exito!!, Se ha registrado correctamente');
		}catch(Exception $e){
			return redirect('/#facturacion/productos')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$query = Productos::where('id','=', $id)->get();
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
			$obj= Productos::find($id);
				return view('app.administrador_app.productos.edit',compact('obj'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
	try{
			$info = $request->all();	
			$cli = Productos::find($id);
			$cli->update($info);
			return response()->json($cli,200);			
		}catch(Exception $e){
			return redirect('/#facturacion/productos')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$obj = Productos::find($id)->delete();			
			return response()->json($obj,200);
		}catch(Exception $e){
			return response()->json('Error!!, Se ha presentado un problema, error : '.$e,500);
		}
	}

	public function info($id)
	{
		if(!empty ($id)){
			$query = Productos::find($id);
			return response()->json($query,200);
		}
	}

}
