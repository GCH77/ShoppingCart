<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineasProducto extends Model
{
    public function productos()
    {
        return $this->hasOne('App\Producto', 'id', 'id_producto');
    }

    public function lineas()
    {
        return $this->hasOne('App\Linea', 'id', 'id_linea');
    }
}
