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
			'titulo' => 'Informatica'
		]);

		Carrera::create([
			'titulo' => 'ADE'
		]);
    
		Carrera::create([
			'titulo' => 'Derecho'
		]);
		
		Carrera::create([
			'titulo' => 'Magisterio'
		]);

		Carrera::create([
			'titulo' => 'Periodismo'
		]);

		Carrera::create([
			'titulo' => 'Marketing'
		]);
    }
}