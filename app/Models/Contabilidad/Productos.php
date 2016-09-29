<?php namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model {

    protected $table = '360_productos';
    
    protected $fillable = array('id',
    							'codigo',
    							'descripcion',
    							'precio_costo',
								'precio_venta',
								'categoria',
								'linea',
								'marca',
								'nombre_producto',
								'unidad_medida',
								'unidad_empaque',
								'c_unidad_medida',
								'c_unidad_empaque',
								'stock_max',
								'stock_min',
								'reorder',
								'puntos_me',
								'iva',
								'ieps');
}



