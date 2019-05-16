<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        factory(App\Persona::class, 1)->create()->each(
            function($persona){
                DB::table('users')->insert([
                    'id_persona' => $persona->id,
                    'username' => 'Admin',
                    'email' => 'admin@admin.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                    ]);
                }
            );
            
            DB::table('personas')->insert([
                'id_rol' => 5,
                'nombre' => 'John',
                'apellidos' => 'Doe',
                'id_tipos_documento' => 2,
                'num_documento' => '111222333',
                'direccion' => 'calle 123 # 345',
                'telefono' => '3210123',
                'correo' => 'email@email.com'
                ]);
    }
}
        