<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public function personasRoles()
    {
        return $this->hasOne('App\PersonasRole', 'id_personas_rol_cliente', 'id');
    }
    
    public function facturasDetalle()
    {
        return $this->belognsTo('App\FacturasDetalle', 'id_factura');
    }
}
