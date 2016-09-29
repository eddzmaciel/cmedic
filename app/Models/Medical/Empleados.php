<?php namespace App\Models\Medical;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model {

    protected $table = '360_empleados';
    
    protected $fillable = array('id',
    							'id_empresa',
    							'id_sucursal',
    							'nombre',
								'rfc',
								'curp',
								'fecha_alta',
								'fecha_baja',
								'regimen_pago_sat',
								'puesto',
								'salario_nomina',
								'sdi',
								'nss',
								'tipo_contrato_sat',
								'periodo_pago_sat',
								'telefono',
								'calle',
								'num_exterior',
								'num_interior',
								'piso',
								'pais',
								'colonia',
								'codigo_postal',
								'ciudad_municipio',
								'estado',
								'email','estatus');
}



