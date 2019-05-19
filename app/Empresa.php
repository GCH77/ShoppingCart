<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function proveedorProducto()
    {
        return $this->hasMany('App\ProveedorProducto', 'id_empresa', 'id');
    }

    public function persona()
    {
        return $this->hasOne('App\Persona', 'id', 'id_personas');
    }
}
