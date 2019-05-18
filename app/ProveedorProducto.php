<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorProducto extends Model
{
    public function productos()
    {
        return $this->belongsTo('App\Producto', 'id_producto');
    }

    public function empresas()
    {
        return $this->belongsTo('App\Empresa', 'id_empresa');
    }
}
