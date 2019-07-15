<?php

use App\User;
use App\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$carrera = Carrera::where('titulo', '=', 'No Aplica')->first();

        User::create([
        	'perfil'	=>	'pasajero',
        	'name'	=>	'Usuario Prueba',
        	'email'		=>	'correo@gmail.com',
        	'password'	=>	bcrypt('qwerty123'),
        	'telefono'	=> 	'1234327998 ',        	
        ]);
    }
}
