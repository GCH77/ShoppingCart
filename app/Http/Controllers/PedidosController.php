<?php

namespace App\Http\Controllers;

use App\Almacene;
use App\Producto;
use App\ProveedorProducto;

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
        return ProveedorProducto::with('empresas', 'productos')->get();
        // return Empresa::with(
        //     'proveedorProducto',
        //     'proveedorProducto.productos', 
        //     'proveedorProducto.productos.genero', 
        //     'proveedorProducto.productos.marca',
        //     'proveedorProducto.productos.almacenes'
        //     )->get();
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
        // dd($request);
        $pedidoHecho = '';
        if ($request->id_producto != 0) {
            // Producto existente
            $pedido = new ProveedorProducto();
            $pedido->id_empresa = $request->id_empresa;
            $pedido->id_producto = $request->id_producto;
            $pedido->cantidad = $request->cantidad;
            $pedido->statusProgress = 0;
            $pedido->visibility = 0;
            $pedido->save();

            $pedidoHecho = ProveedorProducto::where('id', $pedido->id)->with('empresas', 'productos')->get();
        }else {
            //Producto NO existente
            $producto = new Producto();
            $producto->nombre = $request->nombreP;
            $producto->estado = 0;
            $producto->id_marca = $request->id_marca;
            $producto->id_genero = $request->id_genero;
            $producto->save();

            $pedido = new ProveedorProducto();
            $pedido->id_empresa = $request->id_empresa;
            $pedido->id_producto = $producto->id;
            $pedido->cantidad = $request->cantidad;
            $pedido->statusProgress = 0;
            $pedido->save();

            $pedidoHecho = ProveedorProducto::where('id', $pedido->id)->with('empresas', 'productos')->get();
        }

        // $pedidoHecho = ProveedorProducto::where('id', $pedido->id)->with('empresas', 'productos')->get();

        return $pedidoHecho[0];
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
        ProveedorProducto::where('id', $request->id)->update(['statusProgress' => $request->statusProgress]);
        Producto::where('id', $request->id_producto)->where('estado', 0)->update(['estado' => 1]);
        $pedido = ProveedorProducto::where('id', $request->id)->with('empresas', 'productos')->get();
        return $pedido[0];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProveedorProducto  $proveedorProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $pedido = ProveedorProducto::find($id);
        
        $producto = Producto::where('id', $pedido->id_producto)
                            ->where('estado', 0)
                            ->get();
        $pedido->delete();
        if (sizeof($producto) > 0) {
            $producto[0]->delete();
        }
        
    }
}
