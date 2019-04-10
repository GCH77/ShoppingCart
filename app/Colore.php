<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Colore extends Model
{
    public function producto()
    {
        return $this->belongsToMany('App\Producto');
    }
}
