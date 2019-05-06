<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
		DB::table('Carreras')->truncate();
		DB::table('Users')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // $this->call(UsersTableSeeder::class);
		$this->call(CarrerasSeeder::class);
		$this->call(UserSeeder::class);
    }
}
