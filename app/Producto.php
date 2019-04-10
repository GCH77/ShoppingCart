<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function marca()
    {
        return $this->hasOne('App\Marca', 'id_marca', 'id');
    }

    public function colores()
    {
        return $this->belongsToMany('App\Colore')
                    ->using('App\ColoresProducto')
                    ->withPivot([
                        'color',
                        'hexa'
                    ]);
    }
}
