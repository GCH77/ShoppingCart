<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function genero()
    {
        return $this->hasOne('App\Genero', 'id', 'id_genero');
    }

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
        return $this->hasMany('App\Imagene', 'id_productos', 'id');
    }

    public function lineasProducto()
    {
        return $this->hasMany('App\LineasProducto', 'id_productos', 'id');
    }

    public function almacenes()
    {
        return $this->hasMany('App\Almacene', 'id_productos', 'id');
    }

    public function tallasProducto()
    {
        return $this->hasMany('App\TallasProducto', 'id_productos', 'id');
    }
}
