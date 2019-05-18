<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisosRolesModFunc extends Model
{
  public function modulos()
  {
    return $this->hasOne('App\Modulo', 'id', 'id_modulos');
  }

  public function funcionalidades()
  {
    return $this->hasOne('App\Funcionalidade', 'id', 'id_funcionalidades');
  }

  public function roles()
  {
    return $this->belongsTo('App\Role', 'id_roles');
  }
}
