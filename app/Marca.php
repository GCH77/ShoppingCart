<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_marca');
    }
}
