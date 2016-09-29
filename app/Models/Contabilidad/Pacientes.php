<?php namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model {

 protected $table = 'pacientes';    
  protected $fillable = array('id','pnombre','papellidos','pedad','pdireccion','ptelefono','ptipo_sangre','pemail');

}
