<?php namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model {

    protected $table = '360_proveedores';
    
    protected $fillable = array('id',
    							'id_empresa',
								'id_sucursal',
								'nombre',
								'rfc',
								'curp',
								'fecha_alta',
								'nombre_corto',
								'proveedor_extranjero',
								'ranking',
								'telefono',
								'zip_code',
								'calle',
								'num_interior',
								'num_exterior',
								'colonia',
								'codigo_postal',
								'piso',
								'ciudad_municipio',
								'estado',
								'pais',
								'email_uno',
								'email_dos',
								'sitio_web','estatus');
}