<?php namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model {

protected $table = 'medicos';    
  protected $fillable = array('id','dcedprof','dnombre','dapellidos','dtelefono','demail');

}
