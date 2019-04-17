<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function personasRoles()
    {
        return $this->hasMany('App\PersonasRole', 'id_roles', 'id');
    }
}
