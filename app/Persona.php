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
        return $this->hasOne('App\TiposDocumento', 'id', 'id_tipos_documento');
    }

    public function personasRoles()
    {
        return $this->hasMany('App\PersonasRole', 'id_persona', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id_persona', 'id');
    }
}
