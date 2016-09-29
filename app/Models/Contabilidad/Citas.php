<?php namespace App\Models\Contabilidad;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model {

protected $table = 'citas';    
  protected $fillable = array('id','cfecha','cnotas','cpid','cdid');

}
