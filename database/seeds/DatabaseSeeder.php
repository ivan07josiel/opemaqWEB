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
        // Rada seeders dos usuarios
        $this->call(UsersTableSeeder::class);

        // Rada seeders das funcoes
        $this->call(FuncoesTableSeeder::class);

        // Rada seeders dos funcionarios
        $this->call(FuncionariosTableSeeder::class);

        // Rada seeders dos propriedades
        $this->call(PropriedadesTableSeeder::class);

        // Rada seeders dos tratores
        $this->call(TratoresTableSeeder::class);
    }
}
