<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonasRole extends Model
{
  public function persona()
  {
    return $this->hasOne('App\Persona', 'id', 'id_persona');
  }

  public function roles()
  {
    return $this->hasOne('App\Role', 'id', 'id_roles');
  }
}
