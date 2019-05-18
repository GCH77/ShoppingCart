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

    public function rol()
    {
        return $this->hasOne('App\Role', 'id', 'id_rol');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id_persona', 'id');
    }

    public function empresas()
    {
        return $this->belongsTo('App\Empresa', 'id_personas');
    }
}
