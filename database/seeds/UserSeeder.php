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
        	'perfil'	=>	'conductor',
        	'nombre'	=>	'Juan Rodríguez',
        	'email'		=>	'juanr@correo.com',
        	'password'	=>	bcrypt('juan'),
        	'telefono'	=> 	'+34910608247',
        	'carrera_id'=>	$carrera->id,

        ]);
    }
}
