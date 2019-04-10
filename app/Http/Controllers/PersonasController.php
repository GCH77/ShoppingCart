<?php

namespace App\Http\Controllers;

use App\Producto;

use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function index()
    {
        return Producto::all();
    }
}
