<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturasDetalle extends Model
{
    public function facturas()
    {
        return $this->hasMany('App\Factura', 'id_factura', 'id');
    }
}
