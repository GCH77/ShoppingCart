<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Almacene;
use App\Persona;
use App\User;
use PDF;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = Persona::find($request->id);
        if (
            $persona->num_documento == null || $persona->num_documento == '' ||
            $persona->id_tipos_documento == null || $persona->id_tipos_documento == '' ||
            $persona->direccion == null || $persona->direccion == '' ||
            $persona->telefono == null || $persona->telefono == ''
        ) {
            Persona::where('id', $request->id)
            ->update([
                'id_tipos_documento' => $request->id_tipos_documento,
                'num_documento' => $request->num_documento,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono
                ]);
            
            // $almacen = Almacene::where('id_productos', $request->id_producto)->get();
            // $cantidad = $almacen[0]->cantidad - $request->quantity;
            // Almacene::where('id_productos', $request->id_producto)->update(['cantidad' => $cantidad]);
        }
        for ($i=0; $i < sizeof($request->productos); $i++) { 
            $almacen = Almacene::where('id_productos', $request->productos[$i]['id'])->get();
            $cantidad = $almacen[0]->cantidad - $request->productos[$i]['quantity'];
            Almacene::where('id_productos', $request->productos[$i]['id'])->update(['cantidad' => $cantidad]);
        }


    }

    // public function generatePDF()
    // {
    //     $request = ['title' => 'Reporte Factura'];
    //     $pdf = app('dompdf.wrapper');
    //     $pdf->loadView('archivos.factura', compact('request'));
    //     return $pdf->stream('factura.pdf');

    // }

    public function generatePDF(Request $request)
    {   
        $request = Persona::all();
        $data = Producto::with('almacenes','marca')->get();

        // $data = Persona::find($request->id);
        // $request = [
        //     // $request->nombre=>$request->nombre,
        //     // 'nombre' => $request->nombre,
        //     // 'apellidos' => $request->apellidos,
        //     // 'num_documento' => $request->num_documento,
        //     // 'direccion' => $request->direccion,
        //     // 'telefono' => $request->telefono,
        //     // 'correo' => $request->correo,
        //     'title' => 'Reporte Factura'
        // ];

        $pdf = PDF::loadView('archivos.factura', compact('request', 'data'));
        return $pdf->stream('factura.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
