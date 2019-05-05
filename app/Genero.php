<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    public function generosProducto()
    {
        return $this->belongsTo('App\Producto', 'id_genero');
    }
}
