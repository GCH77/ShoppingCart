<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'apellidos'
    ];

    public function tipoDocumento()
    {
        return $this->hasOne('App\TiposDocumento', 'id_tipos_documento', 'id');
    }

    public function personasRoles()
    {
        return $this->hasMany('App\PersonasRole', 'id_persona', 'id');
    }
}
