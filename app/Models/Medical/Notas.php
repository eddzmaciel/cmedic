<?php namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model {

	 protected $table = 'notas';    
  protected $fillable = array('id','nfecha_emision','nmedicamentos','nestatus','nnotas');

}
