<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductosCliente extends Controller
{
    public function index()
    {
        return Producto::where('estado', 1)->where('visibility', 1)->with('marca', 'coloresProducto.color', 
                                                            'imagenes', 'lineasProducto.lineas', 
                                                            'almacenes', 'genero',
                                                            'tallasProducto.tallas')->get();
    }
}
