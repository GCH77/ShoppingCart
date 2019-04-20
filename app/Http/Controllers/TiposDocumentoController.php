<?php

namespace App\Http\Controllers;

use App\TiposDocumento;
use Illuminate\Http\Request;

class TiposDocumentoController extends Controller
{
    public function index()
    {
        return TiposDocumento::all();
    }
}
