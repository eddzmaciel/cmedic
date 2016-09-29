
<?php namespace App\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model {
	 protected $table = 'recipes';    
  protected $fillable = array('id','rfecha_emision','rmedicamentos','restatus','rnotas');

}
