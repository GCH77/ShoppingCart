<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenerosProducto extends Model
{
    public function productos()
    {
      return $this->hasOne('App\Producto', 'id', 'id_productos');
    }
  
    public function generos()
    {
      return $this->hasOne('App\Genero', 'id', 'id_generos');
    }
}
