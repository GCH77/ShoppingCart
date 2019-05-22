<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Persona;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return Empresa::with('persona', 'persona.tipoDocumento', 'persona.rol')->get();
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
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->id_tipos_documento = $request->id_tipos_documento;
        $persona->num_documento = $request->num_documento;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->correo;
        $persona->id_rol = 5;
        $persona->save();
        
        $empresa = new Empresa();
        $empresa->nit = $request->nit;
        $empresa->razon_social = $request->razon_social;
        $empresa->direccione = $request->direccione;
        $empresa->id_personas = $persona->id;
        $empresa->save();

        $data = Empresa::where('id', $empresa->id)->with('persona', 'persona.rol', 'persona.tipoDocumento')->get();
        return $data[0];
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Empresa  $empresa
    * @return \Illuminate\Http\Response
    */
    public function show(Empresa $empresa)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Empresa  $empresa
    * @return \Illuminate\Http\Response
    */
    public function edit(Empresa $empresa)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Empresa  $empresa
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($request->id_personas);
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->id_tipos_documento = $request->id_tipos_documento;
        $persona->num_documento = $request->num_documento;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->correo;
        $persona->save();
        
        $empresa = Empresa::find($id);
        $empresa->nit = $request->nit;
        $empresa->razon_social = $request->razon_social;
        $empresa->direccione = $request->direccione;
        $empresa->id_personas = $persona->id;
        $empresa->save();

        $data = Empresa::where('id', $empresa->id)->with('persona', 'persona.rol', 'persona.tipoDocumento')->get();
        return $data[0];
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Empresa  $empresa
    * @return \Illuminate\Http\Response
    */
    public function destroy(Empresa $empresa, $id)
    {
        $empresa = Empresa::find($id);
        $persona = Persona::where('id', $empresa->id_personas);
        $empresa->delete();
        $persona->delete();
    }
}
