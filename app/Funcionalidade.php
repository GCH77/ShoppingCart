<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionalidade extends Model
{
    public function funcionalidadesPermisos()
    {
        return $this->hasMany('App\PermisosRolesModFunc', 'id_funcionalidades', 'id');
    }
}
