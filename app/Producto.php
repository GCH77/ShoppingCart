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

    public function imagenes()
    {
        return $this->hasMany('App\Imagenes', 'id_productos', 'id');
    }

    public function categoriaLineas()
    {
        return $this->hasMany('App\CategoriaLinea', 'id_producto', 'id');
    }
}
