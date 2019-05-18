<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    public function modulosPermisos()
    {
        return $this->belongsTo('App\PermisosRolesModFunc', 'id_modulos');
    }

}
