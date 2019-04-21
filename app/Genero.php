<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    public function generosProducto()
    {
        return $this->hasMany('App\GenerosProducto', 'id_generos', 'id');
    }
}
