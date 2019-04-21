<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use App\PersonasRole;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Persona::with('user', 'rol', 'tipoDocumento')->get();
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
        $persona->id_rol = $request->id_rol;
        $persona->save();

        $user = new User();
        $user->id_persona = $persona->id;
        $user->username = $request->nameuser;
        $user->email = $request->correo;
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //password
        $user->save();

        $data = Persona::where('id', $persona->id)->with('user', 'rol', 'tipoDocumento')->get();
        return $data[0];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->id_tipos_documento = $request->id_tipos_documento;
        $persona->num_documento = $request->num_documento;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->correo;
        $persona->id_rol = $request->id_rol;
        $persona->save();

        $user = User::find($request->user['id']);
        $user->id_persona = $persona->id;
        $user->username = $request->user['username'];
        $user->email = $request->correo;
        $user->save();

        $data = Persona::where('id', $persona->id)->with('user', 'rol', 'tipoDocumento')->get();
        return $data[0];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $user = User::where('id_persona', $persona->id);
        $user->delete();
        $persona->delete();
    }
}
