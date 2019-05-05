<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacene extends Model
{
    public function productos()
    {
        return $this->belongsTo('App\Producto', 'id_productos');
    }
}
