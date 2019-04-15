<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        return Producto::with('coloresProducto.color')->get();
    }
}
