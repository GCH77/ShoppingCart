<?php

namespace App\Http\Controllers;

use App\Role;
use App\PermisosRolesModFunc;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::with('permisosRolesModFunc')->get();
        return $roles;
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
        $roles = new Role();
        $roles->rol = $request->rol;
        $roles->descripcion = $request->descripcion;
        $roles->save();

        $methodsFunc = array();
        foreach ($request->permisos_roles_mod_func as $key => $value) {
            $methodsFunc[$key] = explode(",",$value);
        }
        // dd($methodsFunc[0][0]);
        
        for ($i=0; $i < sizeof($methodsFunc); $i++) { 
            $permisos = new PermisosRolesModFunc();
            $permisos->id_roles = $roles->id;
            $permisos->id_modulos = $methodsFunc[$i][0];
            $permisos->id_funcionalidades = $methodsFunc[$i][1];
            $permisos->save();
            // print_r($methodsFunc[$i][1]);

        }

        $data = Role::where('id', $roles->id)->with('permisosRolesModFunc')->get();
        return $data[0];
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
        $roles = Role::find($id);
        $roles->rol = $request->rol;
        $roles->descripcion = $request->descripcion;
        $roles->save();

        $methodsFunc = array();
        foreach ($request->permisos_roles_mod_func as $key => $value) {
            $methodsFunc[$key] = explode(",",$value);
        }
        // dd($methodsFunc[0][0]);
        PermisosRolesModFunc::where('id_roles', $roles->id)->delete();
        
        for ($i=0; $i < sizeof($methodsFunc); $i++) { 
            $permisos = new PermisosRolesModFunc();
            $permisos->id_roles = $roles->id;
            $permisos->id_modulos = $methodsFunc[$i][0];
            $permisos->id_funcionalidades = $methodsFunc[$i][1];
            $permisos->save();
            // print_r($methodsFunc[$i][1]);

        }
        
        $data = Role::where('id', $roles->id)->with('permisosRolesModFunc')->get();
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
        $permisos = PermisosRolesModFunc::where('id_roles', $id)->delete();
        $roles = Role::find($id);
        $roles->delete();
    }
    
}
