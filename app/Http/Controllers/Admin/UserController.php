<?php namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Contabilidad\Sucursales;
use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->role_id == 1){
			$list = \DB::table('users')->where('estatus','!=',2)->get();
			$total = \DB::table('users')->where('estatus','!=',2)->count();
			$activos = \DB::table('users')->where('estatus',0)->count();
			$suspendidos = \DB::table('users')->where('estatus',1)->count();
		}else{
			$list = \DB::table('users')->where('estatus','!=',2)->where('id_sucursal',Auth::user()->id_sucursal)->get();
			$total = \DB::table('users')->where('estatus','!=',2)->where('id_sucursal',Auth::user()->id_sucursal)->count();
			$activos = \DB::table('users')->where('estatus',0)->where('id_sucursal',Auth::user()->id_sucursal)->count();
			$suspendidos = \DB::table('users')->where('estatus',1)->where('id_sucursal',Auth::user()->id_sucursal)->count();
		}
		return response()->json(['usuarios' => $list, 'total' => $total, 'activos' => $activos, 'suspendidos' => $suspendidos]);
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
				'name' 		=> 'required',
	    		'email' 		=> 'required',
	    		'password' 		=> 'required',
	    		'role_id' 		=> 'required', 		
	    	);
			$v = \Validator::make($request->all(),$rules);
			if($v->fails()){
				return redirect('/#admin/usuarios')->withWarning('Error!!, Se ha presentado un problema, error : '.$v->errors());			
			}
			$nombre_avatar = "default.jpg";
			if($request->file('avatar')){				
				$file = $request->file('avatar');
		       	$nombre_avatar = $file->getClientOriginalName();
		       	\Storage::disk('avatares')->put($nombre_avatar,  \File::get($file));
			}	
			$user = new User($request->all());
			$user->avatar = $nombre_avatar;
			$user->save();			
			return redirect('/#admin/usuarios')->withSuccess('Exito!!, Se ha registrado correctamente');
		}catch(Exception $e){
			return redirect('/#admin/usuarios')->withWarning('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$query = User::where('id','=', $id)->first();
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
		if(Auth::user()->role_id == 1){
			$user= User::find($id);
			$cat = Sucursales::all()->lists('nombre','id');
		}else{
			$user= \DB::table('users')->where('id',$id)->where('id_sucursal',Auth::user()->id_sucursal)->first();
			$cat = Sucursales::where('id',Auth::user()->id_sucursal)->lists('nombre','id');
		}
   		return view('app.administrador.usuarios.edit',compact('user'),compact('cat'));
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
			$rules = array(
	    		'name' 		=> 'required',
	    		'email' 		=> 'required',
	    		'role_id' 		=> 'required', 	    		
	    	);
			$v = \Validator::make($request->all(),$rules);
			if($v->fails()){
				return redirect('/#admin/usuarios/editar/'.$id)->withWarning('Error!!, Se ha presentado un problema, error : '.$v->errors());			
			}
			$infoUser = $request->all();	
			$user = User::find($id);
			$user->update($infoUser);			
			return redirect('/#admin/usuarios')->withSuccess('Exito!!, Se ha actualizado correctamente');
		}catch(Exception $e){
			return redirect('/#admin/usuarios')->withWarning('Error!!, Se ha presentado un problema, error : '.$e);	
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
			$user = User::find($id);
			$user->estatus = 2;
			$user->save();			
			return response()->json($user,200);
		}catch(Exception $e){
			return response()->json('Error!!, Se ha presentado un problema, error : '.$e,500);
		}
	}

	public function listUsuariosOrdenes()
	{
		$query = User::where('role_id','=', 5)->get();
		return response()->json($query,200);
	}

	public function postModificarBase(Request $request)
	{		
		try{
			$rules = array(
	    		'password' 		=> 'required',		
	    	);
			$v = \Validator::make($request->all(),$rules);
			if($v->fails()){
				return redirect('/#admin/usuarios/perfil')->withWarning('Error!!, Se ha presentado un problema, error : '.$v->errors());			
			}
			$user = User::find(\Auth::user()->id);
			$user->password = $request->password;
			$user->save();				
			return redirect('/#admin/usuarios/perfil')->withSuccess('Exito!!, Se ha actualizado correctamente');
		}catch(Exception $e){
			return redirect('/#admin/usuarios/perfil')->withWarning('Error!!, Se ha presentado un problema, error : '.$e);	
		}
	}

	public function postModificarAvatar(Request $request)
	{		
		try{
			$rules = array(
	    		'avatar' 		=> 'required', 		
	    	);
			$v = \Validator::make($request->all(),$rules);
			if($v->fails()){
				return redirect('/#admin/usuarios/perfil')->withWarning('Error!!, Se ha presentado un problema, error : '.$v->errors());			
			}
			$nombre_avatar = "default.jpg";
			if($request->file('avatar')){				
				$file = $request->file('avatar');
		       	$nombre_avatar = $file->getClientOriginalName();
		       	\Storage::disk('avatares')->put($nombre_avatar,  \File::get($file));
			}	
			$user = User::find(\Auth::user()->id);			
			$user->avatar = $nombre_avatar;
			$user->save();				
			return redirect('/#admin/usuarios/perfil')->withSuccess('Exito!!, Se ha actualizado correctamente');
		}catch(Exception $e){
			return redirect('/#admin/usuarios/perfil')->withWarning('Error!!, Se ha presentado un problema, error : '.$e);	
		}
	}

	public function getListadoDoctores()
	{
		$query = User::where('role_id', 5)->where('id_sucursal',Auth::user()->id_sucursal)->get();
		return response()->json($query,200);
	}

	public function getListadoEnfermeros()
	{
		$query = User::where('role_id', 6)->where('id_sucursal',Auth::user()->id_sucursal)->get();
		return response()->json($query,200);
	}
}
