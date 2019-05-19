<?php

namespace App\Http\Controllers;

use App\ProveedorProducto;
use App\Empresa;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ProveedorProducto::with('empresas', 'productos')->get();
        return Empresa::with(
            'proveedorProducto',
            'proveedorProducto.productos', 
            'proveedorProducto.productos.genero', 
            'proveedorProducto.productos.marca',
            'proveedorProducto.productos.almacenes'
            )->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProveedorProducto  $proveedorProducto
     * @return \Illuminate\Http\Response
     */
    public function show(ProveedorProducto $proveedorProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProveedorProducto  $proveedorProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProveedorProducto $proveedorProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProveedorProducto  $proveedorProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProveedorProducto $proveedorProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProveedorProducto  $proveedorProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProveedorProducto $proveedorProducto)
    {
        //
    }
}
