<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresasProveedorasController extends Controller
{
    public function index()
    {
        return Empresa::with('proveedorProducto','proveedorProducto.productos', 'proveedorProducto.productos.genero', 'proveedorProducto.productos.marca')->get();
    }
}