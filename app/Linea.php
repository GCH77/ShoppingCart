<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    public function personasRoles()
    {
        return $this->hasOne('App\LineasProducto', 'id_lineas', 'id');
    }
}
