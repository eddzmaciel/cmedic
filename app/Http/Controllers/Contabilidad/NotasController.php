<?php namespace App\Http\Controllers\Contabilidad;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Notas;
use Illuminate\Http\Request;

class NotasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Notas::all()->toJson();
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
			$var = Notas::create($info);			
			return redirect('/#contabilidad/notas')->withSuccess('Exito!!, Se ha registrado correctamente');
		}catch(Exception $e){
			return redirect('/#contabilidad/notas')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
	public function update(Request $request,$id)
	{
		
		try{
			$info = $request->all();	
			$var = Notas::find($id);
			$var->update($info);			
			return response()->json($var,200);
		}catch(Exception $e){
			return redirect('/#contabilidad/notas')->withSuccess('Error!!, Se ha presentado un problema, error : '.$e);	
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
		 	$var=Notas::find($id)->delete();
		 	return response()->json($var,200);
		 	 }catch(Exception $e){
		 	 	return response()->json('Error, se ha presentado un problema: '.$e,500);
		 	 }
	}

	public function info($id)
		{
			if(!empty ($id)){
				$query = Notas::find($id);
				return response()->json($query,200);
				}
		}


}
