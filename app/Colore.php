<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Colore extends Model
{
    public function coloresProducto()
    {
        return $this->hasMany('App\ColoresProducto', 'id_colores', 'id');
    }
}
