<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Carreras')->insert([
        	'titulo' => 'No Aplica'
        ]);

        DB::table('Carreras')->insert([
        	'titulo' => 'Ingeniero Informatica'
        ]);
    
        DB::table('Carreras')->insert([
        	'titulo' => 'Ingeniero Electricista'
        ]);
    
        DB::table('Carreras')->insert([
        	'titulo' => 'Ingeniero Mecanico'
        ]);
    }
}
