<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorProducto extends Model
{
    public function producto()
    {
    return $this->belongsTo('App\Producto', 'id_producto');
    }
    
    public function empresa()
    {
    return $this->belongsTo('App\Empresa', 'id_empresa');
    }
}
