<?php namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {

    protected $table = '360_clientes';
    
    protected $fillable = array('id',
								'id_empresa',
								'id_sucursal',
								'nombre',
								'rfc',
								'fecha_alta',
								'nombre_corto',
								'ranking',
								'id_cuenta_contable',
								'calle',
								'num_exterior',
								'num_interior',
								'colonia',
								'codigo_postal',
								'ciudad_municipio',
								'estado',
								'pais',
								'telefono',
								'tax-id',
								'email_uno',
								'email_dos',
								'email_tres',
								'sitio_web','estatus');
}