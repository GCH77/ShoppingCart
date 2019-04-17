<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacene extends Model
{
    public function productos()
    {
        return $this->hasMany('App\Producto', 'id_producto', 'id');
    }
}
