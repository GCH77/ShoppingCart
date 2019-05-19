<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class pdfController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('myPDF', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
