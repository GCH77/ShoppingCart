<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColoresProducto extends Model
{
  public function productos()
  {
    return $this->hasOne('App\Producto', 'id', 'id_productos');
  }

  public function color()
  {
    return $this->hasOne('App\Colore', 'id', 'id_colores');
  }
}
