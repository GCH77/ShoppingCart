<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    public function index()
    {
        return Genero::all();
    }
}
