<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'rol' => 'Administrador',
            'descripcion' => 'Acceso total'
        ]);

        DB::table('roles')->insert([
            'rol' => 'Secretaria',
            'descripcion' => 'Acceso a solo vista de datos'
        ]);

        DB::table('roles')->insert([
            'rol' => 'Almacenista',
            'descripcion' => 'Acceso a gestion de pedidos y proveedores'
        ]);
        
        DB::table('roles')->insert([
            'rol' => 'Cliente',
            'descripcion' => 'Acceso a vista, compra y facturacion de productos'
        ]);
        
        DB::table('roles')->insert([
            'rol' => 'Proveedor',
            'descripcion' => 'Acceso restringido del sistema'
        ]);

    }
}
