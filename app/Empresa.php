<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function persona()
    {
    return $this->belongsTo('App\Persona', 'id_personas');
    }
}
