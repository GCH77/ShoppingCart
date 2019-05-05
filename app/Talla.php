<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    public function tallasProducto()
    {
        return $this->hasMany('App\TallasProducto', 'id_tallas', 'id');
    }
}
