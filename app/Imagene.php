<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagene extends Model
{
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_productos');
    }
}
