<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class pdfController extends Controller
{
    public function generatePDF()
    {
        $request = ['title' => 'Factura de Venta'];
        $pdf = PDF::loadView('archivos.factura', $request);
        return $pdf->download('factura.pdf');
    }
}
