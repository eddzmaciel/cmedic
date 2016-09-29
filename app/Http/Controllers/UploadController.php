<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UploadController extends Controller {


	protected $file;
	protected $destPath;
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function __construct ($file,$destPath) 
	{
		$this->file = $file;
		$this->destPath = $destPath;
	}

	public function uploadFile() 
	{
		$destinationPath = 'uploads/'.$this->destPath;
		$filename = str_random(12);
		$extFile = explode('.', $this->file->getClientOriginalName());
		$filename = date('y-m-d').'-'.$filename.'.'.$extFile[1];
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = $this->file->move($destinationPath, $filename);
		return true;
	}

}
