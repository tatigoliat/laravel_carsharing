<?php

use App\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    public function run()
    {
        // DB::table('Carreras')->insert([
        // 	'titulo' => 'No Aplica'
        // ]);

        Carrera::create([
			'titulo' => 'No Aplica'
        ]);

		Carrera::create([
			'titulo' => 'Ingeniero Informatica'
		]);

		Carrera::create([
			'titulo' => 'Ingeniero Electricista'
		]);
    
		Carrera::create([
			'titulo' => 'Ingeniero Mecanico'
		]);
    }
}
