<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    public function personasRoles()
    {
        return $this->hasOne('App\CategoriaLinea', 'id_linea', 'id');
    }
}
