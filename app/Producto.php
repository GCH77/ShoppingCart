<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function marca()
    {
        return $this->hasOne('App\Marca', 'id', 'id_marca');
    }

    public function coloresProducto()
    {
        return $this->hasMany('App\ColoresProducto', 'id_productos', 'id');
    }
}
