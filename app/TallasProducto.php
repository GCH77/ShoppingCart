<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallasProducto extends Model
{
    public function productos()
  {
    return $this->hasOne('App\Producto', 'id', 'id_productos');
  }

  public function tallas()
  {
    return $this->hasOne('App\Talla', 'id', 'id_tallas');
  }
}
