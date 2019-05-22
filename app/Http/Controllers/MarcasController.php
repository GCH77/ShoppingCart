<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index()
    {
        return Marca::all();
    }
}
