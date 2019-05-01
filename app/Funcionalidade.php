<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionalidade extends Model
{
    public function funcionalidadesPermisos()
    {
    return $this->belongsTo('App\PermisosRolesModFunc', 'id_funcionalidades');
    }
}
