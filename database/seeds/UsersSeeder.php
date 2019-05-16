<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_persona' => 2,
            'username' => 'John Doe',
            'email' => 'email@email.com',
            'password' => bcrypt('password')
            ]);
    }
}
