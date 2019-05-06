<?php

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
    	$carrera = DB::table('carreras')->select('id')->where('titulo', '=', 'No Aplica')->first();

        DB::table('users')->insert([
        	'perfil'	=>	'conductor',
        	'nombre'	=>	'Juan Rodríguez',
        	'email'		=>	'juanr@correo.com',
        	'password'	=>	bcrypt('juan'),
        	'telefono'	=> 	'+34910608247',
        	'carrera_id'=>	$carrera->id,

        ]);
    }
}
